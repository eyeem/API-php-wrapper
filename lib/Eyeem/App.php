<?php

class Eyeem_App extends Eyeem_Ressource
{

  public static $name = 'app';

  public static $endpoint = '/apps/{id}';

  public static $properties = array(
    /* Basic */
    'id',
    'name',
    'url',
    'icon',
    'redirectUrl',
    'access',
    'clientId',
    'clientSecret',
    'approved'
  );

}
