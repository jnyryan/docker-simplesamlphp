$metadata['http://VAGRANT-DC.contoso.com/adfs/services/trust'] = array (
  'entityid' => 'http://VAGRANT-DC.contoso.com/adfs/services/trust',
  'contacts' =>
  array (
  ),
  'metadata-set' => 'saml20-idp-remote',
  'SingleSignOnService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://vagrant-dc.contoso.com/adfs/ls/',
    ),
    1 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://vagrant-dc.contoso.com/adfs/ls/',
    ),
  ),
  'SingleLogoutService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://vagrant-dc.contoso.com/adfs/ls/',
    ),
    1 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://vagrant-dc.contoso.com/adfs/ls/',
    ),
  ),
  'ArtifactResolutionService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
      'Location' => 'https://vagrant-dc.contoso.com/adfs/services/trust/artifactresolution',
      'index' => 0,
    ),
  ),
  'keys' =>
  array (
    0 =>
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIC7jCCAdagAwIBAgIQYKVG/d9SKKpMnEZIF+jfmzANBgkqhkiG9w0BAQsFADAzMTEwLwYDVQQDEyhBREZTIEVuY3J5cHRpb24gLSBWQUdSQU5ULURDLmNvbnRvc28uY29tMB4XDTE0MDgxMzEwMTAyOFoXDTE1MDgxMzEwMTAyOFowMzExMC8GA1UEAxMoQURGUyBFbmNyeXB0aW9uIC0gVkFHUkFOVC1EQy5jb250b3NvLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAKH4rMnA6uKXDX3EZcN6A7sx15xzZ/N8wron7HRNntv096+golaiGnlDlcT59R3pseFXbEu/n7HIdFxazyhtuRiOoM12Qo/HEhW4/5Tgubd0I0PDcMtHzfbrJ3UQD2VSTfUx9lsvGuCBVpG+MYg3BFjG7Vf59zOKXrNb/JdYJnfB5bSuyAhyDRGucWfSQHKo+mbptBHdzcuX2PKUaNBQO00VjctEFOm5Pt9XwTryIrDBVrg9rgffIeOsrZY1m2Qi4N5sMNH8Ou+D44t6LBjLp1BKek+78252jOlSQY5ZyYdo9DSKteggp4qhosH2lNx//qCoJ4yAfCoGYPfsOILuuRsCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAYi63CS64DzxJdmNJmYbHQ+1EKAsPfxYld/sI5XxhKyYxyeKkAeN5j1Y/dtjtXnL9K8xDZD25V/nCOafbHeugCM9vH3UcFiojFV9ExBSsu4ImIRo0CQltgRDzUSZUlgwWXIJ915gRImf3qy8G35b+pfAooX9EQu2oMesEuSxs1OIMrUTjTw/mTajVuLX7sXdooF3TVymyE2jTiij12tSlGJYhxnvvRvV2CvgWGtBvfQEidglUbohde99hdmg6S9B2/Ioz7lwdNrZL95b5mBpVI8FoAaO12uBOMLh1Ll9rSwjCJI88+BUvbSUDTgIPSB58g2s2z+tznkC9jNzSh6ayFQ==',
    ),
    1 =>
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIC6DCCAdCgAwIBAgIQXJRiQ6Dlf7RGYhh8vaCwdTANBgkqhkiG9w0BAQsFADAwMS4wLAYDVQQDEyVBREZTIFNpZ25pbmcgLSBWQUdSQU5ULURDLmNvbnRvc28uY29tMB4XDTE0MDgxMzEwMTAyOFoXDTE1MDgxMzEwMTAyOFowMDEuMCwGA1UEAxMlQURGUyBTaWduaW5nIC0gVkFHUkFOVC1EQy5jb250b3NvLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAJ1PLicM207zW0jZhSuCBROxOQ3S26TPdpF7Tu1Ub7ziE7GVK6nloaAGn4KRmTpMPPomAaPejBKGo8XJJw++SRE2fw+cU2H5i/SeltGziqiTHJDp7a2HeWZnB9/QQoi4cbEAhWyX8CH49JsxLEQTFnYWvEesoYMFFgnIjhRD8E7NmYpNnt91x+cHZpbfN3QewrvkM7UpdeOowT6jlaYg1FDMDPEyoVlZHLE5cSs3Nsp0LW9/vwZgjAjxb1MomJJYTzsGgv64F1kHq2/g21OJsPaJ6/eIGIKF+9ItUH8aqqVDZXAqQwWjYZH+YNQOJNQmP7Jqr9EXRbZ6yKY1a80fqFECAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAkar1hIQVj9B/oKm21lpFSXRzb4PHpyWJRoYkFGUrXbx36GczXavvmy/ZsUEeGnYuRTOeEWUZi1+hOsZ+RWfoy2QIuFBV45fzHOXpXtLENHO4Hdv+JGnkU1UGsKWB97MSZW2acgXl1XTOZzka2fcTk3wHo7tBD60ifsJGEfsbgEG4UxSJENS0iVpHg3132K8EXnh7B2YrVvWM8IBOx/3pu+KuPcdPeO0xEm5oos+Vy7jC0kT9VxjdXPHmFlFqFWnx7An1kuC9pkVqFeNYtSQ4Wnah64OQKgNDv84UnoWrS1WKJhnD/9XLTgHYWf8WsnOjSh3r+MiyCy9x3RQWFYKwNA==',
    ),
  ),
);
