<?php
if(basename($_SERVER["PHP_SELF"]) == "database.php"){
    die("403 - Access Forbidden");
}
//SQL Information
$host['hostname'] = 'localhost'; // Hostname [Usually locahost]
$host['user'] = 'root'; // Database Username [Usually root]
$host['password'] = ''; // Database Password [Leave blank if unsure]
$host['database'] = ''; // Database Name

$sitefolder = 'MapleBit-Master'; // default MapleBit-Master
$sitename = 'MapleAdmin';
$siteversion = 'v1.3';

/* Don`t touch. */
$mysqli = new MySQLi($host['hostname'],$host['user'],$host['password'],$host['database']);

/*Convert parts*/

$GMrank = array(
    0   =>   'Player',
    1   =>   'Donator',
    2   =>   'Super Donator',
    3   =>   'Intern',
	4   =>   'GM',
	5   =>   'Super GM',
	6   =>   'Admin',
	7   =>   'Owner'
);

$banRank = array(
    0   =>   'No',
	1   =>   'Yes'
);

$jobs = array(
  1000 =>'Noblesse',
  1100 =>'Dawn Warrior',
  1110 =>'Dawn Warrior',
  1111 =>'Dawn Warrior',
  1112 =>'Dawn Warrior',
  1200 =>'Blaze Wizard',
  1200 =>'Blaze Wizard',
  1210 =>'Blaze Wizard',
  1211 =>'Blaze Wizard',
  1212 =>'Blaze Wizard',
  1300 =>'Wind Archer',
  1310 =>'Wind Archer',
  1311 =>'Wind Archer',
  1312 =>'Wind Archer',
  1400 =>'Night Walker',
  1410 =>'Night Walker',
  1411 =>'Night Walker',
  1412 =>'Night Walker',
  1500 =>'Thunder Breaker',
  1510 =>'Thunder Breaker',
  1511 =>'Thunder Breaker',
  1512 =>'Thunder Breaker',
  2001 =>'Evan',
  2200 =>'Evan',
  2210 =>'Evan',
  2211 =>'Evan',
  2212 =>'Evan',
  2213 =>'Evan',
  2214 =>'Evan',
  2215 =>'Evan',
  2216 =>'Evan',
  2217 =>'Evan',
  2218 =>'Evan',
  2000 =>'Legend',
  2100 =>'Aran',
  2110 =>'Aran',
  2111 =>'Aran',
  2112 =>'Aran',
  2300 =>'Mercedes',
  2310 =>'Mercedes',
  2311 =>'Mercedes',
  2312 =>'Mercedes',
  2003 =>'Phantom',
  2400 =>'Phantom',
  2410 =>'Phantom',
  2411 =>'Phantom',
  2412 =>'Phantom',
  3000 => 'Citizen',
  3100 =>'Demon Slayer',
  3110 =>'Demon Slayer',
  3111 =>'Demon Slayer',
  3112 =>'Demon Slayer',
  3200 =>'Battle Mage',
  3210 =>'Battle Mage',
  3211 =>'Battle Mage',
  3212 =>'Battle Mage',
  3300 =>'Wild Hunter',
  3310 =>'Wild Hunter',
  3311 =>'Wild Hunter',
  3312 =>'Wild Hunter',
  3500 =>'Mechanic',
  3510 =>'Mechanic',
  3511 =>'Mechanic',
  3512 =>'Mechanic',
  900 =>'GameMaster',
  910 =>'Super GM',
  800 =>'Manager',
  500 =>'Pirate',
  510 =>'Brawler',
  520 =>'Gunslinger',
  511 =>'Marauder',
  521 =>'Outlaw',
  512 =>'Buccaneer',
  522 =>'Corsair',
  501 =>'Cannon shooter',
  530 =>'Cannon shooter',
  531 =>'Cannon shooter',
  532 =>'Cannon shooter',
  508 =>'Jett',
  570 =>'Jett',
  571 =>'Jett',
  572 =>'Jett',
  0   =>'Beginner',
  100 =>'Warrior',
  110 =>'Fighter',
  120 =>'Page',
  130 =>'Spearman',
  111 =>'Crusader',
  121 =>'White Knight',
  131 =>'Dragon Knight',
  112 =>'Hero',
  122 =>'Paladin',
  132 =>'Dark Knight',
  200 =>'Magician',
  210 =>'Fire/Poison Wizard',
  220 =>'Ice/Lightning Wizard',
  230 =>'Cleric',
  211 =>'Fire/Poison Mage',
  221 =>'Ice/Lightning Mage',
  231 =>'Priest',
  212 =>'Fire/Poison Arch Mage',
  222 =>'Ice/Lightning Arch Mage',
  232 =>'Bishop',
  300 =>'Bowman',
  310 =>'Hunter',
  320 =>'Crossbowman',
  311 =>'Ranger',
  321 =>'Sniper',
  312 =>'Bow Master',
  322 =>'Crossbow Master',
  400 =>'Thief',
  410 =>'Assassin',
  420 =>'Bandit',
  411 =>'Hermit',
  421 =>'Chief Bandit',
  412 =>'Night Lord',
  422 =>'Shadower',
  430 =>'Blade Recruit',
  431 =>'Blade Acolyte',
  432 =>'Blade Specialist',
  433 =>'Blade Lord',
  434 =>'Blade Master',
  2004 =>'Luminous',
  2700 =>'Luminous 1',
  2710 =>'Luminous 2',
  2711 =>'Luminous 3',
  2712 =>'Luminous 4',
  3101 =>'Demon Avenger 1',
  3120 =>'Demon Avenger 2',
  3121 =>'Demon Avenger 3',
  3122 =>'Demon Avenger 4',
  3002 =>'Xenon',
  3600 =>'Xenon 1',
  3610 =>'Xenon 2',
  3611 =>'Xenon 3',
  3612 =>'Xenon 4',
  4001 =>'Hayato 1',
  4110 =>'Hayato 2',
  4111 =>'Hayato 3',
  4112 =>'Hayato 4',
  4002 =>'Kanna 1',
  4210 =>'Kanna 2',
  4211 =>'Kanna 3',
  4212 =>'Kanna 4',
  6000 =>'Kaiser',
  6100 =>'Kaiser 1',
  6110 =>'Kaiser 2',
  6111 =>'Kaiser 3',
  6112 =>'Kaiser 4',
  6001 =>'Angelic Buster',
  6500 =>'Angelic Buster 1',
  6510 =>'Angelic Buster 2',
  6511 =>'Angelic Buster 3',
  6512 =>'Angelic Buster 4',
  5100 =>'Mihile',
  5110 =>'Mihile',
  5111 =>'Mihile',
  5112 =>'Mihile'
);


/*
This crappy site only supports the MapleBit-Master CMS.

	  It's something...

		¯\_(ツ)_/¯
			|
		 _	|
		  \_|_
			  \_
			  
Made by Lars from BoomBoomMS
*/
?>
