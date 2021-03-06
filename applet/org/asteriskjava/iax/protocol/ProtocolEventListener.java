// NAME
//      $RCSfile: ProtocolEventListener.java,v $
// DESCRIPTION
//      [given below in javadoc format]
// DELTA
//      $Revision: 1237 $
// CREATED
//      $Date: 2009-03-09 15:27:05 +0100 (Mon, 09 Mar 2009) $
// COPYRIGHT
//      Mexuar Technologies Ltd
// TO DO
//
package org.asteriskjava.iax.protocol;

/**
 * Minimal events sent by the protocol engine.
 *
 * @author <a href="mailto:thp@westhawk.co.uk">Tim Panton</a>
 * @version $Revision: 1237 $ $Date: 2009-03-09 15:27:05 +0100 (Mon, 09 Mar 2009) $
 */
public interface ProtocolEventListener {
    public void newCall(Call c);
    public void registered(Friend f, boolean s);
    public void hungUp(Call c);
    public void ringing(Call c);
    public void answered(Call c);
    public void setHostReachable(Friend f, boolean b, int roundtrip);
}

