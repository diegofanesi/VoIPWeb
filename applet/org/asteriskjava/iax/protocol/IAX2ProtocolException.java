// NAME
//      $RCSfile: IAX2ProtocolException.java,v $
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

import java.io.IOException;

/**
 * Generic protocol exception for IAX2 Protocol
 * @author <a href="mailto:thp@westhawk.co.uk">Tim Panton</a>
 * @version $Revision: 1237 $ $Date: 2009-03-09 15:27:05 +0100 (Mon, 09 Mar 2009) $
 *
 */
public class IAX2ProtocolException extends IOException {
    private static final String version_id =
            "@(#)$Id: IAX2ProtocolException.java 1237 2009-03-09 14:27:05Z srt $ Copyright Mexuar Technologies Ltd";


  public IAX2ProtocolException() {
  }

  public IAX2ProtocolException(String p0) {
    super(p0);
  }
}
