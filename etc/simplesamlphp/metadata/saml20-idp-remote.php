<?php
$metadata['https://dubdevdc.dubdev.com/adfs/services/trust'] = array (
  'entityid' => 'https://dubdevdc.dubdev.com/adfs/services/trust',
  'sign.logout' => TRUE,
  'contacts' =>
  array (
  ),
  'metadata-set' => 'saml20-sp-remote',
  'AssertionConsumerService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://dubdevdc.dubdev.com/adfs/ls/',
      'index' => 0,
      'isDefault' => true,
    ),
    1 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
      'Location' => 'https://dubdevdc.dubdev.com/adfs/ls/',
      'index' => 1,
    ),
    2 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://dubdevdc.dubdev.com/adfs/ls/',
      'index' => 2,
    ),
  ),
  'SingleLogoutService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://dubdevdc.dubdev.com/adfs/ls/',
    ),
    1 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://dubdevdc.dubdev.com/adfs/ls/',
    ),
  ),
  'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
  'keys' =>
  array (
    0 =>
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIC6DCCAdCgAwIBAgIQHxdYhXZDNLZAnL9H+grGOzANBgkqhkiG9w0BAQsFADAwMS4wLAYDVQQDEyVBREZTIEVuY3J5cHRpb24gLSBkdWJkZXZkYy5kdWJkZXYuY29tMB4XDTE0MDgyNTEyMDU0MFoXDTE1MDgyNTEyMDU0MFowMDEuMCwGA1UEAxMlQURGUyBFbmNyeXB0aW9uIC0gZHViZGV2ZGMuZHViZGV2LmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBANjyo2jZFeqCGphi6ZJIDz81jOCFVB4PDZJYBdpnGNvgQ569zgp2qGLyGYBQ3xFk8nuoVFsHWphYgTStIhSaFHPc93Vy3TCAXpCSLlqdAqGXeK7naDXL7VQfQI90OT06BsDY7Yx06qPBc7I95XU2RmRI1+X1BIEn3R1R8ExSKHIgZ4KgvEHC7TToafXUHYvQCFVbeLIG9SF4oNBCmuPg3DdRy5hfaZKHE/OiBnNcfLFD+7fJHUPNafkVCQNgHgBRpGWDHRbN+7ewY+MfvZRH8gJsf8ewgibqYV9voghereZaOMGGY23UWRFE1n9bwD3LMEYM13vhP8xTT+j9LFayA7UCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAUpkA+z8lU8ltggkWfZGkZiesY0pUaQXGv5Fkc6DzyFrrrrW/B3ew1BE6dc/OCw0OBPqy8zkQkvKDvNiL355LkzbJI0DMJ09UPpuAUXljmR7r3dxodSYxcyYJxoSevi51ih5Sy+gb5f+bb29QVdZZDZ6ji1uhDBCCm9VE+qFi3lkD1QOdekmOvZdJl17WPM57pjXyM5Sr+GohWJyoFnm3Zts/Bhn3l1hl1MHsQIZ5jEa0Amadok7EK4+YSiclGhk15oyLgywBrsuhsymnK+uhfTfbFihG3o60sRCqhfmklzD0nalaHaUmXLTxJUtNvYPvRWXbr00sBRbB9wgOua5wNA==',
    ),
    1 =>
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIC4jCCAcqgAwIBAgIQVDz+x7Ybh79KBXpVODZ2gzANBgkqhkiG9w0BAQsFADAtMSswKQYDVQQDEyJBREZTIFNpZ25pbmcgLSBkdWJkZXZkYy5kdWJkZXYuY29tMB4XDTE0MDgyNTEyMDU0MFoXDTE1MDgyNTEyMDU0MFowLTErMCkGA1UEAxMiQURGUyBTaWduaW5nIC0gZHViZGV2ZGMuZHViZGV2LmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAJ3lyRvjXTINcVbvEuzh5f2ScDNknuDRzu09EK1uU2kNN4qKQsEFvz1MMXlcGRyyL19IoB865U4tmvr/jxo41PZsFj/Waa9auw2eeGbJ0scOUioiX1R0Jw8z5VEhDLy8VcD6Kixx0nyUMwuYjBUgAIvLUP1H2sW+h3X4i5vTyJBMw79McjlU3Da0+ctYB6R6FbeME9cCMpd7zss1XfvwqVKs+v5IIfX0hekwrjVXIBSTUf1+7JuujXw2JuAVuwCY3KVIKkAewcJvIOtOYJXtftcGU9R+cORpLY7Uv5mwcaVbnjlC1hJTXuYkwi0NGA92r1TlTXBL40vMPyocPcZgyOUCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAW8msIke49KBndVTw1hnY+Y9IGmXqQXKYnK6jXgH0YJ6TqPGoPzBBCZ2KdrTnV9IK9U1xW2oUdj2fgo0iRs5rCbXhAOuxjPKRzvD1BjFqLp1J6gTpvgGlIjksNddVODryz/dfHkVlxRkdRL7KwNqkmhJVZpTuOIrJ6kFsUh1FtEKkTDea8/JuNFRUTTeCFQSNM8o4w+u/8zJg6e5XT1vxfCbI9RrwSfDdEhHvQFjS1kjgNuoFLeS8/NrN9tYzrwN/l8sVPPo73YkALkWvO7M0H9OWfoHeqGFrlOe5VF7RbZTpxohYtXcEBuE0NuTXKaLXwsg5OZLJhFuXToKse0etWg==',
    ),
  ),
  'saml20.sign.assertion' => true,
);
