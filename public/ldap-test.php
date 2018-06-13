<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 13 Jul 2017
 * Time: 14:46
 */

function authorize($username, $password)
{
    if($username != "")
    {
        $ds = ldap_connect("ldaps://ldap.ruf.uni-freiburg.de", "636");

        if (@ldap_bind($ds, "uid={$username},ou=people,dc=uni-freiburg,dc=de", $password))
        {
            $sr = ldap_search($ds, "ou=people,dc=uni-freiburg,dc=de", "uid={$username}");

            $info = ldap_get_entries($ds, $sr);

            $nachname = $info[0]['sn'][0];
            $vorname = $info[0]['givenname'][0];

            $fakult = $info[0]['ruffakultaet'][0];
            $acctype = $info[0]['rufaccounttype'][0];

            $returnValue = array();
            $returnValue['vorname'] = $vorname;
            $returnValue['nachname'] = $nachname;
            $returnValue['fakult'] = $fakult;
            $returnValue['acctype'] = $acctype;

            ldap_close($ds);

            return $returnValue;
        }
    }
    return false;
}

echo authorize('jo34', 'piaggio1407');
echo 'testt';