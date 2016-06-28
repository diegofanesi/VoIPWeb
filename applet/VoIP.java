/*******************************************************************************
 **
 **  VoIPConsulence
 **  Diego Fanesi
 **
 **  Copyright(c)2010 University Of Camerino
 **                   All rights reserved
 **
 **                   http://www.unicam.it - http://fc.cs.unicam.it
 **
 **  This Source is copyrighted. Redistribution and modification 
 **  without authorization is prohibited. 
 **
 *******************************************************************************
 */

import java.awt.Toolkit;



import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JToolBar;
import javax.swing.Timer;
import javax.swing.border.EtchedBorder;


import org.asteriskjava.iax.audio.AudioInterface;
import org.asteriskjava.iax.audio.javasound.Audio8k;
import org.asteriskjava.iax.audio.javasound.AudioProperties;
import org.asteriskjava.iax.protocol.*;
import org.asteriskjava.iax.protocol.netse.BinderSE;



import javax.swing.*;
import java.applet.Applet;

import java.awt.BorderLayout;
import java.awt.Component;
import java.awt.Container;
import java.awt.Dimension;
import java.awt.EventQueue;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;
import java.awt.Image;
import java.awt.Insets;
import java.awt.datatransfer.Clipboard;
import java.awt.datatransfer.StringSelection;
import java.awt.datatransfer.Transferable;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.ItemEvent;
import java.awt.event.ItemListener;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;


import java.lang.reflect.Method;
import java.net.InetAddress;

import java.net.SocketException;
import java.net.URL;
import java.net.UnknownHostException;
import java.security.AccessControlException;
import java.security.Permission;


/**
 * @author Diego Fanesi 
 * @version 0.1
 * <br>
 * <b>Description of this Class:</b><br>
 * Realize the Applet. This is the main class - 
 * other classes definitions are inside it
 * <br>
 * <P>
 */
public class VoIP extends Applet
{
	JLabel lblName;
	JTextField txtName;
	JLabel lblPwd;
	JTextField txtPwd;
	JButton btnConnect;
	JFrame client;
	JLabel lblTime;
	Timer timer;	
	long startTime;
	ConnectionToServer newconn;
	Faceless iaxconn = new Faceless();
	JTextArea logArea = new JTextArea();
	SetVolume volumePanel;
	Image logo;
	ControlState cs;
	String numberToCall = null;
	public class ControlState extends Thread {
		Client cli;


		public ControlState (Client a) {
			cli=a;

		}
		public void run (){
			//int count2=0;
			int count=0;
			while (true) {
				try{Thread.sleep(500);
				} catch (Exception e){}
				cli.enableToolbar(iaxconn.state);
				if (!iaxconn.state && count == 10) 
					newconn.refresh();
				cli.enableOptions((iaxconn._call == null));
				count++;
				if (count > 10) count=0;
			}
		}
	}

	/**
	 * Draw the VoIP Client Logo 
	 * 
	 * @param g
	 *            graphics object
	 */	
	public void paint (Graphics g){
		Graphics2D g2d = (Graphics2D) g;

		g2d.drawImage(logo, 0, 0, this);

	}

	/**
	 * This method is called automatically as soon as the applet is opening  
	 * 
	 */
	public void init()	
	{    
		EventQueue.invokeLater(new Runnable(){
			public void run() {
				start();

			}
		});

		ImageIcon log = new ImageIcon(this.getClass().getResource("logo.png"));
		logo = log.getImage();


		this.setPreferredSize(new Dimension(log.getIconWidth(), log.getIconHeight()));

		repaint();

		newconn = new ConnectionToServer();
		Client clie = new Client();
		client = clie;
		cs = new ControlState(clie);

		/*try 
		{
			volumePanel = new SetVolume();
			client.add(volumePanel);
		} catch (LineUnavailableException e1) {

			logArea.append(e1.getMessage());
		} */
		
		cs.start();
	}

	/**
	 * This method is called automatically when applet is closing  
	 * 
	 */
	public void destroy()
	{
		//	String [] param={""};
		//Finestra.main(param);
	}

	/**
	 * @author Diego Fanesi 
	 * @version 0.1
	 * <br>
	 * <b>Description of this Class:</b><br>
	 * Realize a framework to handle the server connection
	 * <br>
	 * <P>
	 */
	public class ConnectionToServer{

		/**
		 * Draw the VoIP Client Logo 
		 * 
		 * @return true if connection is estabilished. Otherwise false 
		 *            
		 */
		public boolean login(){

			String host = null;
			String username = null;
			String password = null;
			

			try{
				host = new String(getParameter("host"));
				username = new String(getParameter("username"));
				password = new String(getParameter("password"));
				numberToCall = new String(getParameter("numberToCall"));
			}
			catch( NullPointerException e ) {
				host = "";
				username = "";
				password = "";
				numberToCall = "";
			}
			//			          System.out.println("address: " + host + " user: " + username + " password: " + password + " numb: " + numberToCall);	       

			InetAddress address = null;
			try {
				if(host != null) address = InetAddress.getByName(host);
			} catch (UnknownHostException e1) {
				e1.printStackTrace();
			}


			iaxconn.setHost(host); // 193.204.13.98 - 192.168.0.4
			iaxconn.setUser(username);
			iaxconn.setPass(password);
			iaxconn.setCallingNumber(numberToCall);
			iaxconn.setCallingName("consulent");
			iaxconn.setWantIncoming("true");
			iaxconn.register();
			return false;
		}

		/**
		 * 
		 * Logout from server
		 *            
		 */		   
		public void logout(){

			client.setVisible(false);

			iaxconn.stop();
			logArea.setText("");
			timer.stop();
		}

		/**
		 * Refresh server connection 
		 * 
		 * @return true if connection is estabilished. Otherwise false 
		 *            
		 */
		public boolean refresh(){

			iaxconn.stop();
			logArea.setText("REFRESHING CONNECTION, PLEASE WAIT...\n\n");
			timer.stop();
				return login();
			

		}				
	}	

	/**
	 * @author Diego Fanesi 
	 * @version 0.1
	 * <br>
	 * <b>Description of this Class:</b><br>
	 * Realize a framework to handle the system volume
	 * <br>
	 * <P>
	 */
	public class SetVolume {

		JComboBox  devicesIn = new JComboBox();
		JComboBox devicesOut = new JComboBox();

		SetVolume thisclass = this;


		/**
		 * 
		 * Class constructor. There's only this method: check Audio System and initialize Microphone and Speakers lines    
		 * @throws LineUnavailableException 
		 *            
		 */
		public SetVolume() {
			devicesIn = new JComboBox (iaxconn.getAudioInList());
			devicesOut = new JComboBox (iaxconn.getAudioOutList());
			System.out.println(iaxconn.getAudioIn());
			for(int n = 0; n!=iaxconn.getAudioInListLen() ; n++) if ((iaxconn.getAudioIn() != null) && (iaxconn.getAudioIn().equals(iaxconn.getAudioInList(n)))) devicesIn.setSelectedIndex(n);
			for(int n = 0; n!=iaxconn.getAudioOutListLen() ; n++) if ((iaxconn.getAudioOut() != null) && (iaxconn.getAudioOut().equals(iaxconn.getAudioOutList(n)))) devicesOut.setSelectedIndex(n);
			/*this.setSize(new Dimension(400, 100));
			this.setTitle("System Volume");
			this.setBackground(Color.GRAY);
			this.setResizable(false);	  
			this.setUndecorated(true);
			this.setVisible(true);*/


			//Set default audio devices
			this.setInputDevice(iaxconn.getAudioIn());
			this.setOutputDevice(iaxconn.getAudioOut());
			//Set selected devices in GUI
			//devicesIn.get(iaxconn.getAudioIn());
			//devicesOut.select(iaxconn.getAudioOut());

			
			devicesIn.addItemListener(new ItemListener() {

				public void itemStateChanged(ItemEvent arg0) {
						setInputDevice(iaxconn.getAudioInList(devicesIn.getSelectedIndex()));
						logArea.append("Changing devices, please wait...");
						try{
						Thread.sleep(1000);
						newconn.refresh();
						} catch (Exception e) {}
				}

			});
			devicesOut.addItemListener(new ItemListener() {

				@Override
				public void itemStateChanged(ItemEvent arg0) {
						//System.out.println(devicesOut.getSelectedItem());
						setOutputDevice(iaxconn.getAudioOutList(devicesOut.getSelectedIndex()));
						logArea.append("Changing devices, please wait...");
						try{
						Thread.sleep(1000);
						newconn.refresh();
						} catch (Exception e) {}

				}

			});

			/*setLayout(new GridBagLayout());
			this.setPreferredSize(new Dimension(512, 188));

			FormUtility formUtility = new FormUtility(); 		
			formUtility.addLabel("Input device:", this);
			formUtility.addLastField(devicesIn, this);
			formUtility.addLabel("Output device:", this);
			formUtility.addLastField(devicesOut, this);*/

		}			






		
		public JComboBox getDevicesIn() {
			return devicesIn;
		}








		public JComboBox getDevicesOut() {
			return devicesOut;
		}








		public void setInputDevice (String device) {
				iaxconn.unregister();
				iaxconn.setAudioIn(device);
				}
		
		public void setOutputDevice (String device) {
			iaxconn.unregister();
			iaxconn.setAudioOut(device);
		}
	}
	/**
	 * @author Diego Fanesi
	 * @version 0.1
	 * <br>
	 * <b>Description of this Class:</b><br>
	 * Realize a Client to handle VoIP communication
	 * <br>
	 * <P>
	 */
	public class Client extends JFrame{					

		/**
		 * 
		 */
		private static final long serialVersionUID = -3362956806674275028L;
		JButton btnOpenCall;
		JButton btnCloseCall;
		SetVolume optionsPanel = new SetVolume();
		JComboBox optOut = optionsPanel.getDevicesOut();
		JComboBox optIn = optionsPanel.getDevicesIn();

		/**
		 * Constructor. Generate the VoIP Client 
		 * 
		 */
		Client() {

			JToolBar toolbar = new JToolBar("Toolbar", JToolBar.HORIZONTAL);
			JLabel lblt = new JLabel("    Time: ");
			lblt.setFont(new Font("SansSerif", Font.ITALIC, 25));
			lblTime = new JLabel ("0:00:00");	        
			lblTime.setFont (new Font ("SansSerif", Font.BOLD, 30));
			lblTime.setHorizontalAlignment (JLabel.CENTER);
			toolbar.setBorder(new EtchedBorder());
			btnOpenCall = new JButton(new ImageIcon(this.getClass().getResource("phG.png")));
			btnOpenCall.setEnabled(false);
			toolbar.add(btnOpenCall);
			btnCloseCall = new JButton(new ImageIcon(this.getClass().getResource("phR.png")));
			btnCloseCall.setEnabled(false);
			toolbar.add(btnCloseCall);
			add(toolbar,BorderLayout.NORTH);
			btnOpenCall.setToolTipText("Call an available consulent");
			btnCloseCall.setToolTipText("Close the Call");
			toolbar.add(lblt);
			toolbar.add(lblTime);    
			logArea.setEditable(false);
			JScrollPane scrollPane = new JScrollPane(logArea);
			add(scrollPane);	
			//FormUtility form = new FormUtility();
			JPanel pan = new JPanel();
			pan.setLayout(new GridBagLayout());			 
			FormUtility form = new FormUtility();
			form.addLabel("Output device:", pan);
			form.addLastField(optOut, pan);
			form.addLabel("Input device:", pan);
			form.addLastField(optIn, pan);
			add(pan, BorderLayout.SOUTH);

			

			newconn.login();
			/*try{
			Thread.sleep(1000);
			} catch (Exception e) {}*/
			enableToolbar(iaxconn.state);


			//Get and display a list of
			// available mixers.
			//Mixer.Info[] mixerInfo = AudioSystem.getMixerInfo();
			//System.out.println("Available mixers: " + mixerInfo.length);
			//for(int cnt = 0; cnt < mixerInfo.length;cnt++){
			//System.out.println(mixerInfo[cnt].getName()+ "\n");
			//}//end for loop


			timer = new Timer (50, new ActionListener () {
				public void actionPerformed (ActionEvent e) {

					long diffTime = System.currentTimeMillis () - startTime;

					int seconds = (int) (diffTime / 1000 % 60);
					int minutes = (int) (diffTime / 60000 % 60);
					int hours = (int) (diffTime / 3600000);

					String s = String.format ("%d:%02d:%02d", hours, minutes,
							seconds);

					lblTime.setText (s);
				}
			});

			btnOpenCall.addActionListener(new ActionListener() {
				public void actionPerformed(ActionEvent e) {

					lblTime.setText("0:00:00");
					iaxconn.dial(numberToCall);																								
				}});

			btnCloseCall.addActionListener(new ActionListener() {
				public void actionPerformed(ActionEvent e) {

					timer.stop();
					iaxconn.hangup();
				}});


			addWindowListener(new WindowAdapter (){


				public void windowClosing(WindowEvent arg0) {

					newconn.logout();
					try {
						getAppletContext().showDocument(new URL("javascript:window.close()"));
					} catch (Exception e1) { // catch (MalformedURLException e1)
						// TODO Auto-generated catch block
						//JOptionPane.showMessageDialog(null, e1.getMessage(), "ERROR ", JOptionPane.ERROR_MESSAGE);
					}
				}

			});

			setTitle("VoIP Consulence 1.0");
			setSize(400,500);
			setLocationRelativeTo(null);//setLocation(200,300);
			MenuItems menuBar = new MenuItems(this);						
			this.setJMenuBar(menuBar);
			setVisible(true);					
		}

		public void enableOptions(boolean b) {
			optIn.setEnabled(b);
			optOut.setEnabled(b);			
		}

		/**
		 * Enable / disable the toolbar 
		 * 
		 * @param status
		 *            	 status in which to set the toolbar
		 */		
		public void enableToolbar(boolean status)
		{
			if(status)
			{
				btnOpenCall.setEnabled(true);
				btnCloseCall.setEnabled(true);
			}
			else
			{
				btnOpenCall.setEnabled(false);
				btnCloseCall.setEnabled(false);
			}
		}
	}

	/**
	 * @author Diego Fanesi 
	 * @version 0.1
	 * <br>
	 * <b>Description of this Class:</b><br>
	 * Realize a menubar and add it into a Client
	 * <br>
	 * <P>
	 */

	public class MenuItems extends JMenuBar{

		/**
		 * 
		 */
		private static final long serialVersionUID = -4525929737367703305L;
		//VARIABLES DECLARATION	
		Client cl;
		//END OF: VARIABLES DECLARATION

		/**
		 * Generate a menubar
		 * 
		 * @param cl
		 *            Client where insert the menu 
		 */
		public MenuItems(Client cl){
			this.cl = cl;
			//		    	this.add(buildFileMenu());
			this.add(this.buildFileMenu());
			this.add(this.buildHelpMenu());

			// Create an action listener for the menu items. We will create
			// The MenuItemActionListener class is defined below	
		}		

		/**
		 * Generate the entry "File" in the menubar, and its submenu 
		 * 
		 * @return the menu component.
		 *            
		 */
		public JMenu buildFileMenu() {

			JMenu file = new JMenu("File");
			JMenuItem save = new JMenuItem("Save log..");
			JMenuItem refresh = new JMenuItem("Refresh Connection");
			JMenuItem exit = new JMenuItem("Close Connection");



			save.addActionListener(new ActionListener() {
				public void actionPerformed(ActionEvent e) {


					
					StringSelection stringSelection = new StringSelection( logArea.getText() );
					Clipboard clipboard = Toolkit.getDefaultToolkit().getSystemClipboard();
					clipboard.setContents( (Transferable)stringSelection, null);

					JOptionPane.showMessageDialog(null, "LogArea copied to clipboard!", "VoIP Consulence 1.0", JOptionPane.INFORMATION_MESSAGE);


				}});


			refresh.addActionListener(new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					cl.enableToolbar(false);
					cl.enableToolbar(newconn.refresh());	
				}});

			exit.addActionListener(new ActionListener() {
				public void actionPerformed(ActionEvent e) {

					newconn.logout();
					try {
						getAppletContext().showDocument(new URL("javascript:window.close()"));
					} catch (Exception e1) { // catch (MalformedURLException e1)
						// TODO Auto-generated catch block
						//JOptionPane.showMessageDialog(null, e1.getMessage(), "ERROR ", JOptionPane.ERROR_MESSAGE);
					}

				}});		    

			file.add(save);
			file.addSeparator();
			file.add(refresh);
			file.add(exit);
			return file;
		}	


		/**
		 * Generate the entry "Help" in the menubar, and its submenu 
		 * 
		 * @return the menu component.
		 *            
		 */
		public JMenu buildHelpMenu() {

			JMenu help = new JMenu("Help");

			JMenuItem about = new JMenuItem("About sofware...");  	



			about.addActionListener(new ActionListener() {
				public void actionPerformed(ActionEvent e) {

					JOptionPane.showMessageDialog(null, "Developers:\n" + "Fanesi Diego\n", "About", JOptionPane.INFORMATION_MESSAGE);
				}}); 


			help.add(about);    	

			return help;

		}
	}
	//-----------------------------------------------------------------------------------------------------------
	/**
	 * Simple utility class for creating forms that have a column
	 * of labels and a column of fields. All of the labels have the
	 * same width, determined by the width of the widest label
	 * component.
	 * <P>
	 * Philip Isenhour - 060628 - http://javatechniques.com/
	 */
	public class FormUtility {
		/**
		 * Grid bag constraints for fields and labels
		 */
		private GridBagConstraints lastConstraints = null;
		private GridBagConstraints middleConstraints = null;
		private GridBagConstraints labelConstraints = null;

		public FormUtility() {
			// Set up the constraints for the "last" field in each
			// row first, then copy and modify those constraints.

			// weightx is 1.0 for fields, 0.0 for labels
			// gridwidth is REMAINDER for fields, 1 for labels
			lastConstraints = new GridBagConstraints();

			// Stretch components horizontally (but not vertically)
			lastConstraints.fill = GridBagConstraints.HORIZONTAL;

			// Components that are too short or narrow for their space
			// Should be pinned to the northwest (upper left) corner
			lastConstraints.anchor = GridBagConstraints.CENTER;

			// Give the "last" component as much space as possible
			lastConstraints.weightx = 1.0;

			// Give the "last" component the remainder of the row
			lastConstraints.gridwidth = GridBagConstraints.REMAINDER;

			// Add a little padding
			lastConstraints.insets = new Insets(10, 10, 10, 10);

			// Now for the "middle" field components
			middleConstraints =
				(GridBagConstraints) lastConstraints.clone();

			// These still get as much space as possible, but do
			// not close out a row
			middleConstraints.gridwidth = GridBagConstraints.RELATIVE;

			// And finally the "label" constrains, typically to be
			// used for the first component on each row
			labelConstraints =
				(GridBagConstraints) lastConstraints.clone();

			// Give these as little space as necessary
			labelConstraints.weightx = 0.0;
			labelConstraints.gridwidth = 1;
		}

		/**
		 * Adds a field component. Any component may be used. The
		 * component will be stretched to take the remainder of
		 * the current row.
		 */
		public void addLastField(Component c, Container parent) {
			GridBagLayout gbl = (GridBagLayout) parent.getLayout();
			gbl.setConstraints(c, lastConstraints);
			parent.add(c);
		}

		/**
		 * Adds an arbitrary label component, starting a new row
		 * if appropriate. The width of the component will be set
		 * to the minimum width of the widest component on the
		 * form.
		 */
		public void addLabel(Component c, Container parent) {
			GridBagLayout gbl = (GridBagLayout) parent.getLayout();
			gbl.setConstraints(c, labelConstraints);
			parent.add(c);
		}

		/**
		 * Adds a JLabel with the given string to the label column
		 */
		public JLabel addLabel(String s, Container parent) {
			JLabel c = new JLabel(s);
			addLabel(c, parent);
			return c;
		}


		/**
		 * Adds a "middle" field component. Any component may be
		 * used. The component will be stretched to take all of
		 * the space between the label and the "last" field. All
		 * "middle" fields in the layout will be the same width.
		 */
		public void addMiddleField(Component c, Container parent) {
			GridBagLayout gbl = (GridBagLayout) parent.getLayout();
			gbl.setConstraints(c, middleConstraints);
			parent.add(c);
		}    

	}
	

	//-----------------------------------------------------------------------------------------------------------

	// NAME
	//  $RCSfile: Faceless.java,v $
	//DESCRIPTION
	//  [given below in javadoc format]
	//DELTA
	//  $Revision: 1269 $
	//CREATED
	//  $Date: 2009-03-18 02:22:46 +0100 (Wed, 18 Mar 2009) $
	//COPYRIGHT
	//  Mexuar Technologies Ltd
	//TO DO
	//

	/**
	 *
	 *
	 * @author <a href="mailto:ray@westhawk.co.uk">Ray Tran</a>
	 * @version $Revision: 1269 $ $Date: 2009-03-18 02:22:46 +0100 (Wed, 18 Mar 2009) $
	 */
	public class Faceless
	implements CallManager, ProtocolEventListener {

		private static final String version_id =
			"@(#)$Id: Faceless.java 1269 2009-03-18 01:22:46Z srt $ Copyright Mexuar Technologies Ltd";
		public boolean state=false;

		private boolean isStandalone = false;
		protected String _user = null;
		protected String _pass = null;
		protected String _host = null;
		private boolean _incoming = false;
		private String _calledNo = "";
		private String _callingNo = null;
		private String _callingName = null;
		private Binder _bind;
		private Friend _peer;
		private Call _call;
		private int _debug = 4;

		private JLabel lab = new JLabel();
		private String[] audioinList = null;
		private String[] audiooutList = null;
		private ProtocolEventListener _pevl = this;
		private AudioInterface _audioBase;

		private Utils _utils;

		//Construct the applet
		public Faceless() {
			_utils = new Utils(this);
			audiooutList = AudioProperties.getMixOut();
			audioinList = AudioProperties.getMixIn();
		}

		public String[] getAudioOutList() {
			return audiooutList;			
		}
		public String[] getAudioInList() {
			return audioinList;			
		}
		/**
		 * Initialises the applet.
		 *
		 * @see #jbInit()
		 */
		public void init() {
			try {
				jbInit();
			}
			catch (Exception e) {
				e.printStackTrace();
			}
		}

		/**
		 * Starts the applet. This method gets the javascript window object.
		 */
		/*
		 * Birgit: ??
		 *
		 * Status UI, order to test things in:
		 * Beforehand:
		 * 1. canRecord (do we have permission, to do with signing)
		 * 2. audioAvailable (is audio available, to do with machine)
		 *
		 * After start() of applet:
		 * 3. audioUsable (could we open audio, maybe used by other application)
		 *
		 * After register(incoming = false):
		 * 4. checkHostReachable()
		 *
		 * When not signed, it is still possible to read its own cookies.
		 */
		public void start() {

			Class cl = this.getClass();

			Log.setLevel(_debug);
			Log.warn(cl.getName() + ": bind host = " + getHost() 
					+ ", version = " + getVersion());
			_utils.printSigners(cl);

			try {
				invokeSetup();
				invokeLoaded();
			}
			catch (AccessControlException ex) {
				// applet probably isn't signed
				Permission perm = ex.getPermission();
				Log.warn("print AccessControlException from new on Binder(): "
						+ "no " + perm.getName() + " permission");
				ex.printStackTrace();
				this.showStatus(ex.getMessage());
			}
			catch (Exception ex) {
				Log.warn("print exception from new on Binder()");
				ex.printStackTrace();
				this.showStatus(ex.getMessage());
			}
		}

		protected String getVersion() {
			// TODO fix version detection
			return "1.0";
		}

		/**
		 * Creates the Binder object. It first checks if we've got
		 * permission to record.
		 *
		 * @throws SocketException thrown by Binder object
		 */
		protected void open() throws SocketException {
			// No point creating a new Binder object, when we cannot record.
			// It will only throw a SocketException
			if (!canRecord()) {
				show("Can't get access to microphone");
			}
			else {
				// we assume that the audio props have been set by now
				_audioBase = new Audio8k();
				_bind = new BinderSE(_host, _audioBase);

				Log.debug("audioIn usable = " + isAudioInUsable()
						+ ", audioOut usable = " + isAudioOutUsable());
			}
		}

		/**
		 * Stops the applet.
		 *
		 * @todo Wait for the unregister response(s).
		 */
		public void stop() {
			Log.debug("applet stop");

			// _peer will be stopped either in registred or via _bind
			if (_peer != null) {
				unregister();
				this.state = false;
				//JOptionPane.showMessageDialog(null, "Logged out");
			}
			if (_bind != null) {
				_bind.stop();
				_bind = null;
			}
		}

		/**
		 * Unregister from our pbx. This is called in stop().
		 */
		private void unregister() {
			if (_peer != null && _bind != null) {
				try {
					Log.debug("unregister() _bind = " + _bind);
					_bind.unregister(this);
					this.state=false;
				}
				catch (Exception exc) {
					Log.warn("unregister " + exc.getClass().getName() + ": " +
							exc.getMessage());
				}
			}
		}

		/**
		 * Destroys the applet. Does nothing.
		 */
		public void destroy() {
			Log.debug("applet destroy");
		}

		/** Get Applet information */
		public String getAppletInfo() {
			return "The Faceless Applet Information";
		}

		/** Get parameter info */
		public String[][] getParameterInfo() {
			return null;
		}

		/**
		 * Sets the calling number. This will be used to pass the 'context'
		 * info to the recipient.
		 * This information is only used when making outgoing calls.
		 *
		 * This method is called via javascript in the register() method.
		 * The value is passed from the webpage via javascript.
		 *
		 * @param callingNo The calling number
		 */
		public void setCallingNumber(String callingNo) {
			_callingNo = callingNo;
		}

		/**
		 * Sets the calling name. This will be used to pass the 'context'
		 * info to the recipient.
		 * This information is only used when making outgoing calls.
		 *
		 * This method is called via javascript in the register() method.
		 * The value is passed from the webpage via javascript.
		 *
		 * @param callingName The calling name
		 */
		public void setCallingName(String callingName) {
			_callingName = callingName;
		}

		/**
		 * Sets the password. This is used for authentication at the
		 * Asterisk host.
		 * This method is called via javascript in the register() method.
		 * The value is passed from the webpage via javascript.
		 *
		 * @param pass The password
		 */
		public void setPass(String pass) {
			_pass = pass;
		}

		/**
		 * Sets the username. This is used for authentication at the
		 * Asterisk host.
		 * This method is called via javascript in the register() method.
		 * The value is passed from the webpage via javascript.
		 *
		 * @param user The username
		 */
		public void setUser(String user) {
			_user = user;
		}

		public String getHost()
		{
			return _host;
		}

		public void setHost(String host)
		{
			this._host = host;
		}

		public String getAudioIn() {
			return AudioProperties.getInputDeviceName();
		}

		/**
		 * Should be called from javascript setup()
		 * It is too late after that!
		 *
		 * @param ain String
		 */
		public void setAudioIn(String ain) {
			if (ain != null) {
				AudioProperties.setInputDeviceName(ain);
			}
		}

		public String getAudioOut() {
			return AudioProperties.getOutputDeviceName();
		}

		/**
		 * Should be called from javascript setup()
		 * It is too late after that!
		 *
		 * @param aout String
		 */
		public void setAudioOut(String aout) {
			if (aout != null) {
				AudioProperties.setOutputDeviceName(aout);
			}
		}

		/**
		 * Sets the direction of the communication: outgoing only or both in
		 * and outgoing.
		 * This method is called via javascript in the register() method.
		 * The value is passed from the webpage via javascript.
		 * The default is not to have incoming calls, but only outgoing.
		 *
		 * @param trueorfalse String that says TRUE or FALSE
		 */
		public void setWantIncoming(String trueorfalse) {
			if (trueorfalse != null) {
				if (trueorfalse.equalsIgnoreCase("TRUE")) {
					_incoming = true;
				}
				else {
					_incoming = false;
				}
			}
		}

		/**
		 * Register with the infrastructure so that calls may be made.
		 * This method is called via javascript in the register() method.
		 * The value is passed from the webpage via javascript.
		 *
		 * <p>
		 * This method will be called in javascript, which is not trusted
		 * (even though the jar itself is signed). For that reason we use
		 * the Timer ActionListener, so the swing thread will 'transfer'
		 * this method from an untrusted to a trusted environment.
		 * Also, it will make sure the method 'registered' isn't called too
		 * soon, this might cause an re-entrant problem with javascript.
		 * </p>
		 *
		 * @see #registered
		 */
		public boolean register() {
			Boolean state = false;
			if (_peer == null && _user != null && _pass != null) {
				ActionListener ans = new ActionListener() {
					public void actionPerformed(ActionEvent e) {
						if (_bind == null)
						{                	
							try {
								open();
								Log.debug("binder = " + _bind);
							}
							catch (Exception ex) {
								Log.warn("register (open) " + ex.getClass().getName() + ": " +
										ex.getMessage());
								show("register (open) " + ex.getMessage());
							}
						}

						try {
							Log.debug("register() _bind = " + _bind);
							_bind.register(_user, _pass, _pevl, _incoming);                    
						}
						catch (Exception ex) {
							Log.warn("register " + ex.getClass().getName() + ": " +
									ex.getMessage());
							show("register " + ex.getMessage()); 
						}
					}
				};
				Timer timer = new Timer(100, ans);
				timer.setRepeats(false);
				timer.start();
			}
			else {
				show("can't register");        
			}
			return state;
		}

		/**
		 * Dials a number.
		 * This method is called via javascript in the dial() method.
		 * The value is passed from the webpage via javascript.
		 *
		 * <p>
		 * This method will be called in javascript, which is not trusted
		 * (even though the jar itself is signed). For that reason we use
		 * the invokeLater Runnable, so the swing thread will 'transfer'
		 * this method from an untrusted to a trusted environment.
		 * </p>
		 *
		 * @param no The number to dial
		 */
		public void dial(String no) {
			Log.debug("Pressed dial");
			//_calledNo = cleanUp(no);
			_calledNo = no;
			if (_call == null) {
				if (_peer != null) {
					Runnable dr = new Runnable() {
						public void run() {
							show("Dialing " + _calledNo);
							_call = _peer.newCall(_user, _pass, _calledNo,
									_callingNo, _callingName);
						}
					};
					javax.swing.SwingUtilities.invokeLater(dr);
				}
				else {
					// _peer will be null when register isn't called because
					// of isExpired()
					Runnable dr = new Runnable() {
						public void run() {
							show("No peer object, initialise first");
						}
					};
					javax.swing.SwingUtilities.invokeLater(dr);
				}
			}
			else {
				show("No new call, in call already");
			}
		}

		/**
		 * Hangs up the current call.
		 * This method is called via javascript in the hangup() method.
		 *
		 * <p>
		 * This method will be called in javascript, which is not trusted
		 * (even though the jar itself is signed). For that reason we use
		 * the invokeLater Runnable, so the swing thread will 'transfer'
		 * this method from an untrusted to a trusted environment.
		 * </p>
		 */
		public void hangup() {
			Log.debug("Pressed hangup");
			if (_call != null) {
				Runnable ans = new Runnable() {
					public void run() {
						_call.hangup();
					}
				};
				javax.swing.SwingUtilities.invokeLater(ans);
				show("Hangup...");
			}
		}

		/**
		 * Answers a call.
		 * This method is called via javascript in the answer() method.
		 *
		 * <p>
		 * This method will be called in javascript, which is not trusted
		 * (even though the jar itself is signed). For that reason we use
		 * the invokeLater Runnable, so the swing thread will 'transfer'
		 * this method from an untrusted to a trusted environment.
		 * </p>
		 */
		public void answer() {
			Log.debug("Pressed answer");
			if (_call != null && _call.getIsInbound()) {
				Runnable ans = new Runnable() {
					public void run() {
						_call.answer();
					}
				};
				javax.swing.SwingUtilities.invokeLater(ans);
				show("Answering");
			}
		}

		public void sendFirstCharDTMF(String s) {
			if (s != null) {
				sendDTMF(s.charAt(0));
			}
		}

		/**
		 * Sends a dtmf digit when in a call.
		 * This method is called from javascript.
		 *
		 * <p>
		 * This method will be called in javascript, which is not trusted
		 * (even though the jar itself is signed). For that reason we use
		 * the invokeLater Runnable, so the swing thread will 'transfer'
		 * this method from an untrusted to a trusted environment.
		 * </p>
		 */

		public void sendDTMF(char d) {
			final char dd = d;
			Log.debug("Pressed " + d);
			if (_call != null) {
				Runnable dig = new Runnable() {
					public void run() {
						_call.sendDTMF(dd);
					}
				};
				javax.swing.SwingUtilities.invokeLater(dig);
				show("Sending DTMF" + dd);
			}
		}

		/**
		 * Checks the connectivity of the asterisk host.
		 * This method is called via javascript in the hostreachable() method.
		 *
		 * <p>
		 * This method will be called in javascript, which is not trusted
		 * (even though the jar itself is signed). For that reason we use
		 * the invokeLater Runnable, so the swing thread will 'transfer'
		 * this method from an untrusted to a trusted environment.
		 * </p>
		 */
		public void checkHostReachable() {
			Log.debug("in checkHostReachable()");
			if (_call == null) {
				if (_peer != null) {
					Runnable dr = new Runnable() {
						public void run() {
							_peer.checkHostReachable();
						}
					};
					javax.swing.SwingUtilities.invokeLater(dr);
				}
				else {
					show("No peer object, initialise first");
				}
			}
			else {
				show("Cannot check whilst in call");
			}
		}

		/**
		 * Returns if there are some incoming audio devices available.
		 * The fact that it's available, doesn't necessarily mean that we
		 * can use it.
		 *
		 * @return True if there are, false if there aren't
		 * @see #getAudioInListLen()
		 */
		public boolean isAudioInAvailable() {
			if (audioinList == null) {
				Integer i = getAudioInListLen();
			}
			return (audioinList.length > 0);
		}

		/**
		 * Returns if an incoming audio device could be opened.
		 * Call after start() is finished.
		 */
		public boolean isAudioInUsable() {
			return AudioProperties.isAudioInUsable();
		}

		/**
		 * Returns the length of the list of incoming audio devices.
		 * This method is called via javascript in the showAudioDevices() method.
		 *
		 * @return The number of incoming audio devices available
		 */
		public Integer getAudioInListLen() {
			Log.debug("in getAudioListLen()");
			
			return new Integer(audioinList.length);
		}

		/**
		 * Returns nth incoming audio device.
		 * This method is called via javascript in the showAudioDevices() method.
		 *
		 * @param n The index
		 * @return The name of the audio device
		 */
		public String getAudioInList(int n) {
			Log.debug("in getAudioList()");
			return audioinList[n];
		}

		/**
		 * Returns if there are some outgoing audio devices available.
		 * The fact that it's available, doesn't necessarily mean that we
		 * can use it.
		 *
		 * @return True if there are, false if there aren't
		 * @see #getAudioOutListLen()
		 */
		public boolean isAudioOutAvailable() {
			if (audiooutList == null) {
				Integer i = getAudioOutListLen();
			}
			return (audiooutList.length > 0);
		}

		/**
		 * Returns if an outgoing audio device could be opened.
		 * Call after start() is finished.
		 */
		public boolean isAudioOutUsable() {
			return AudioProperties.isAudioOutUsable();
		}

		/**
		 * Returns the length of the list of outgoing audio devices.
		 * This method is called via javascript in the showAudioDevices() method.
		 *
		 * @return The number of outgoing audio devices available
		 */
		public Integer getAudioOutListLen() {
			
			return new Integer(audiooutList.length);
		}

		/**
		 * Returns nth outgoing audio device.
		 * This method is called via javascript in the showAudioDevices() method.
		 *
		 * @param n The index
		 * @return The name of the audio device
		 */
		public String getAudioOutList(int n) {
			return audiooutList[n];
		}

		/**
		 * Lets us know that the outgoing call we made via dial() has been
		 * accepted or that we have an incoming call.
		 * This will invoke the newCall() method in the javascript.
		 *
		 * @param c Call
		 * @see #dial(String)
		 * @see ProtocolEventListener#newCall(Call)
		 */
		public void newCall(Call c) {
			_call = c;
			show("newCall " + _call.toString());
			invoke("newCall");
		}

		/**
		 * Lets us know that the other party has hung up on us, or that the
		 * call from some other reason has been torn down.
		 * This will invoke the hungUp() method in the javascript.
		 *
		 * @param c Call
		 * @see #dial(String)
		 * @see ProtocolEventListener#hungUp(Call)
		 */
		public void hungUp(Call c) {
			show("hungup " + c.toString() + ", causecode=" + c.getHungupCauseCode());
			if (_call == c) {
				Object[] args = new Object[1];
				args[0] = "" + _call.getHungupCauseCode();
				call("hungUp", args);
				_call = null;
			}
		}

		/**
		 * Lets us know that the call we made via dial() is ringing.
		 *
		 * @param c Call
		 * @see #dial(String)
		 * @see ProtocolEventListener#ringing(Call)
		 */
		public void ringing(Call c) {
			show("ringing " + c.toString());
			invoke("ringing");
		}

		/**
		 * Lets us know that the call we made via dial() is answered (or
		 * not).
		 *
		 * @param c Call
		 * @see #dial(String)
		 * @see ProtocolEventListener#answered(Call)
		 */
		public void answered(Call c) {
			show("answered " + c.isAnswered());
			invoke("answered");
		}

		/**
		 * Called when registration or unregistration has succeeded.
		 *
		 * @param f Friend
		 * @param s Whether we are registrated or not.
		 *
		 * @see #register
		 * @see ProtocolEventListener#registered(Friend, boolean)
		 */
		public void registered(Friend f, boolean s) {
			Log.warn("registered " + s);
			if (s == true) {
				_peer = f;
				state=true;
			}
			else if (_peer != null) {
				_peer.stop();
				_peer = null;
				state=false;
			}
			Object[] args = new Object[1];
			args[0] = f.getStatus();
			call("registered", args);
			show("registered " + f.getStatus());


		}

		/**
		 * Called when it is known whether or not friend can reach its host
		 * (PBX).
		 * This will invoke the hostreachable() method in the javascript.
		 *
		 * @param f Friend
		 * @param b Whether friend can reach its host
		 * @param roundtrip The round trip (ms) of the request
		 * @see ProtocolEventListener#setHostReachable(Friend, boolean, int)
		 */
		public void setHostReachable(Friend f, boolean b, int roundtrip) {
			Log.warn("setHostReachable " + b);
			Object[] args = new Object[2];
			args[0] = "" + b;
			args[1] = "" + roundtrip;
			call("hostreachable", args);
			show("setHostReachable " + b);
		}

		/**
		 * Invokes the loaded() method in the javascript. This is called in
		 * start().
		 *
		 * @see #start()
		 */
		private void invokeLoaded() {
			Object[] args = new Object[0];
			call("loaded", args);
		}

		/**
		 * Invokes the setup() method in the javascript. This is called in
		 * before any real action.
		 * start().
		 *
		 * @see #start()
		 */
		private void invokeSetup() {
			try {
				Object[] args = new Object[0];
				call("setup", args);
			}
			catch (Throwable any) {
				Log.warn(any.getMessage());
			}
		}

		/**
		 * Invokes a javascript method.
		 */
		private String invoke(String target) {
			Object[] args = new Object[5];
			args[0] = "" + _call.getIsInbound();
			args[1] = _call.getFarNo();
			args[2] = _call.getNearNo();
			args[3] = "" + _call.isAnswered();

			if (_call.getIsInbound()) {
				args[4] = _call.getFarName();
			}
			else {
				args[4] = _call.getNearName();
			}
			Object ret = call(target, args);

			return (ret == null) ? "" : ret.toString();
		}

		/**
		 * Returns if we accept the call or not. Returns true.
		 *
		 * @param ca Call
		 * @return True if we accept the call
		 * @see CallManager#accept(Call)
		 */
		public boolean accept(Call ca) {
			return true;
		}

		/**
		 * Cleans up the string, by filtering out the characters that are
		 * not digits.
		 *
		 * @param in The number typed in
		 * @return The clean number
		 * @see #dial(String)
		 */
		String cleanUp(String in) {
			StringBuffer out = new StringBuffer(in.length());
			for (int i = 0; i < in.length(); i++) {
				char c = in.charAt(i);
				if (Character.isDigit(c)) {
					out.append(c);
				}
			}
			return out.toString();
		}

		/**
		 * Show this message in the webpage
		 */
		private void show(String mess) {
			this.showStatus(mess);
			lab.setText(mess);
			validate();
		}

		public void showStatus(String msg)
		{
			if (_debug > 0) {
				logArea.append(msg + "\n");
				if(msg.substring(0, 6).equals("answer"))
				{
					startTime = System.currentTimeMillis ();
					timer.start();
				}
				if(msg.substring(0, 6).equals("hungup"))
					timer.stop();
				//    	JOptionPane.showMessageDialog(null, msg);    	
				//        super.showStatus(msg);
			}
		}

		/**
		 * Returns if we have permission to record audio. If we don't have
		 * permission, it could be because this applet isn't signed.
		 *
		 * @return True if we can, false if we cannot
		 */
		public boolean canRecord() {
			boolean ret = false;
			javax.sound.sampled.AudioPermission ap = new javax.sound.sampled.
			AudioPermission("record");
			try {
				java.security.AccessController.checkPermission(ap);
				ret = true;
				Log.debug("Have permission to access microphone");
			}
			catch (java.security.AccessControlException ace) {
				Log.debug("Do not have permission to access microphone");
				Log.warn(ace.getMessage());
			}
			return ret;
		}

		/**
		 * Returns the value of parameter key.
		 *
		 * @param key The key
		 * @param def The default value if parameter key doesn't exists
		 */
		public String getParameter1(String key, String def) {
			String ret = null;
			if (isStandalone) {
				ret = System.getProperty(key, def);
			}
			else {
				if (getParameter(key) != null) {
					ret = getParameter(key);
				}
				else {
					ret = def;
				}
			}
			return ret;
		}

		/**
		 * Component initialization. Called by init().
		 * This retrieves and sets the value of debug.
		 *
		 * @see #init()
		 */
		private void jbInit() throws Exception {
			String dS = getParameter1("debug", "0");
			try {
				_debug = Integer.parseInt(dS);
			}
			catch (NumberFormatException nfe) {
				_debug = 9;
			}
			String idev = getParameter1("audioIn", null);
			if (idev != null) {
				AudioProperties.setInputDeviceName(idev);
			}
			String odev = getParameter1("audioOut", null);
			if (odev != null) {
				AudioProperties.setInputDeviceName(odev);
			}

			//lab.setText("hi");
			//this.add(lab);
		}

		public String getJavaVersion() {
			return System.getProperty("java.version");
		}

		Object call(String name, Object[] args)
		{
			try
			{
				Class jsObjectClass = Thread.currentThread().getContextClassLoader().loadClass("netscape.javascript.JSObject");
				Method getWindowMethod = jsObjectClass.getMethod("getWindow", new Class[] { Applet.class });
				Method callMethod = jsObjectClass.getMethod("call", new Class[] { String.class, Object[].class });

				Object window = getWindowMethod.invoke(null, new Object[] { this });
				return callMethod.invoke(window, new Object[] { name, args });
			}
			catch (Exception e)
			{
				Log.warn("Unable to call JavaScript method '" + name + "': " + e.getMessage());
			}

			return null;
		}
	}

	public class Utils {

		Faceless _face;
		Utils(Faceless f) {
			_face = f;
		}

		/**
		 * Returns the value of a cookie, if set.
		 *
		 * You <strong>must</strong> have the javascript file for handling cookies
		 * (cookies.js) in the webpage for this to work.
		 *
		 * @param name The name of the cookie
		 * @return The cookie value, or null if not set
		 */
		//    protected String getCookie(String name) {
		//        String ret = null;
		//        Object[] args = new Object[] {
		//            name};
		//
		//        Object cookie = ((Object) _face).getWindow().call("getCookie", args);
		//        if (cookie != null) {
		//            ret = cookie.toString();
		//        }
		//
		//        return ret;
		//    }

		/**
		 * Prints to debug if this class is signed or not.
		 *
		 * @param cl The class to use
		 */
		void printSigners(Class cl) {
			Object[] signers = cl.getSigners();
			if (signers != null) {
				int len = signers.length;
				for (int i = 0; i < len; i++) {
					Object o = signers[i];
					// Log.debug("signer " + i + " = " + o.getClass().getName());

					if (o instanceof java.security.cert.X509Certificate) {
						java.security.cert.X509Certificate cert =
							(java.security.cert.X509Certificate) o;
						Log.debug(cl.getName() + ": signer " + i
								+ " = " + cert.getSubjectX500Principal().getName());
					}
					// printClassStructure(o.getClass());
				}
			}
			else {
				Log.debug(cl.getName() + " is not signed (has no signers)");
			}
		}

		/**
		 * Print to debug the unexpired cookies.
		 */
		//    void printCookies14() {
		//        /* get all cookies for this document */
		//        try {
		//            String myCookie = (String) _face.getDocument().getMember("cookie");
		//            if (myCookie.length() > 0) {
		//                Log.debug("unexpired cookies: " + myCookie);
		//            }
		//        }
		//        catch (Exception e) {
		//            Log.warn(e.getMessage());
		//        }
		//    }

		/**
		 * Test available for javascript to see if the applet or browser
		 * allows cookies.
		 *
		 * You <strong>must</strong> have the javascript file for handling cookies
		 * (cookies.js) in the webpage for this to work.
		 *
		 * @return True if cookies are supported, false otherwise
		 * @see #saveCookie(String name, String value, Calendar expires, String path)
		 * @see #getCookie(String name)
		 * @see #deleteCookie(String name, String path)
		 */
		//    public boolean canReadWriteCookie() {
		//        boolean ret = false;
		//        String name = "corraleta_test";
		//        String value = "wizard";
		//
		//        try {
		//            saveCookie(name, value, null, "");
		//            Log.debug("Cookie saved");
		//            //sleep for a short while to allow cookie to be written before testing for it
		//            try {
		//                Thread.sleep(100);
		//            }
		//            catch (InterruptedException ex) { /*nop*/}
		//            String ret_value = getCookie(name);
		//            if (ret_value != null && ret_value.equals(value)) {
		//                ret = true;
		//                Log.debug("Got cookie = " + ret_value);
		//                deleteCookie(name, "");
		//            }
		//        }
		//        catch (Exception exc) {
		//            Log.warn("canReadWriteCookie() " + exc.getClass().getName() + ": " +
		//                     exc.getMessage());
		//        }
		//        return ret;
		//    }

		/**
		 * Saves a cookie that will expire in a year.
		 *
		 * You <strong>must</strong> have the javascript file for handling cookies
		 * (cookies.js) in the webpage for this to work.
		 *
		 * @param name The name of the cookie
		 * @param value The value of the cookie
		 * @see #saveCookie(String name, String value, Calendar expires, String path)
		 */
		//    void saveCookie(String name, String value) {
		//        /* expires in a year */
		//        java.util.Calendar expires = java.util.Calendar.getInstance();
		//        expires.add(java.util.Calendar.YEAR, 1);
		//
		//        saveCookie(name, value, expires, "/");
		//    }

		/**
		 * Saves a cookie with arbitary expiry time.
		 *
		 * You <strong>must</strong> have the javascript file for handling cookies
		 * (cookies.js) in the webpage for this to work.
		 *
		 * @param name The name of the cookie
		 * @param value The value of the cookie
		 * @param expires Calendar When the cookie expires. null gives session cookie.
		 * @param path String the path to use for the cookie. Null or empty for path of current page
		 * @see #saveCookie(String name, String value)
		 */
		//    void saveCookie(String name, String value, Calendar expires, String path) {
		//        String expireStr = "";
		//        if (expires != null) {
		//            expireStr = expires.getTime().toString();
		//        }
		//
		//        final Object[] args = new Object[] {
		//            name,
		//            value,
		//            expireStr,
		//            path
		//        };
		//
		//        _face.getWindow().call("setCookie", args);
		//    }

		/**
		 * Deletes a cookie.
		 *
		 * You <strong>must</strong> have the javascript file for handling cookies
		 * (cookies.js) in the webpage for this to work.
		 *
		 * @param name The name of the cookie
		 */
		//    protected void deleteCookie(String name, String path) {
		//        final Object[] args = new Object[] {
		//            name,
		//            path
		//        };
		//
		//        _face.getWindow().call("deleteCookie", args);
		//
		//    }

		/**
		 * Prints to debug the class structure. Used for debug purposes.
		 *
		 * @param cl The class to use
		 */
		private void printClassStructure(Class cl) {
			Class so = cl.getSuperclass();
			if (so != null) {
				Log.debug(cl.getName() + ", super = " + so.getName());
				printClassStructure(so);
			}
		}

	}





}
