<?php
session_start();

/*
==========================================================
 GUESS THE GAME - PHP + Steam Store API
==========================================================
*/

$games = [
    // GTA
    271590 => ["Grand Theft Auto V", ["gta", "gta 5", "gta v", "grand theft auto 5"]],
    12210  => ["Grand Theft Auto IV", ["gta 4", "gta iv", "grand theft auto 4"]],
    12120  => ["Grand Theft Auto: San Andreas", ["gta sa", "san andreas", "gta san andreas"]],
    32470  => ["Grand Theft Auto: Vice City", ["gta vc", "vice city", "gta vice city"]],
    12110  => ["Grand Theft Auto III", ["gta 3", "gta iii", "grand theft auto 3"]],

    // Witcher
    292030 => ["The Witcher 3: Wild Hunt", ["witcher 3", "wiedzmin 3", "wiedźmin 3", "witcher"]],
    20920  => ["The Witcher 2: Assassins of Kings", ["witcher 2", "wiedzmin 2", "wiedźmin 2"]],
    20900  => ["The Witcher: Enhanced Edition", ["witcher 1", "witcher", "wiedzmin 1", "wiedźmin 1"]],

    // Red Dead
    1174180 => ["Red Dead Redemption 2", ["rdr 2", "rdr2", "red dead 2", "red dead redemption 2"]],
    2668510 => ["Red Dead Redemption", ["rdr", "rdr 1", "red dead redemption"]],

    // Elder Scrolls
    489830 => ["The Elder Scrolls V: Skyrim Special Edition", ["skyrim", "skyrim se", "elder scrolls 5", "tes 5"]],
    72850  => ["The Elder Scrolls V: Skyrim", ["skyrim", "elder scrolls 5", "tes 5"]],
    22330  => ["The Elder Scrolls IV: Oblivion", ["oblivion", "elder scrolls 4", "tes 4"]],
    22320  => ["The Elder Scrolls III: Morrowind", ["morrowind", "elder scrolls 3", "tes 3"]],

    // Fallout
    377160 => ["Fallout 4", ["fallout 4", "fo4"]],
    22380  => ["Fallout: New Vegas", ["fallout nv", "new vegas", "fnv"]],
    38410  => ["Fallout 2", ["fallout 2", "fo2"]],
    38400  => ["Fallout", ["fallout 1", "fo1", "fallout"]],

    // Assassin's Creed
    2208920 => ["Assassin's Creed Valhalla", ["ac valhalla", "assassins creed valhalla", "valhalla"]],
    812140  => ["Assassin's Creed Odyssey", ["ac odyssey", "assassins creed odyssey", "odyssey"]],
    582160  => ["Assassin's Creed Origins", ["ac origins", "assassins creed origins", "origins"]],
    289650  => ["Assassin's Creed Unity", ["ac unity", "assassins creed unity", "unity"]],
    242050  => ["Assassin's Creed IV: Black Flag", ["ac 4", "ac iv", "black flag", "assassins creed 4"]],
    48190   => ["Assassin's Creed Revelations", ["ac revelations", "assassins creed revelations"]],
    201870  => ["Assassin's Creed III", ["ac 3", "ac iii", "assassins creed 3"]],
    33230   => ["Assassin's Creed II", ["ac 2", "ac ii", "assassins creed 2"]],
    15100   => ["Assassin's Creed", ["ac 1", "assassins creed 1", "assassins creed"]],

    // Far Cry
    939960 => ["Far Cry New Dawn", ["far cry new dawn", "fc new dawn"]],
    552520 => ["Far Cry 5", ["far cry 5", "fc5"]],
    298110 => ["Far Cry 4", ["far cry 4", "fc4"]],
    220240 => ["Far Cry 3", ["far cry 3", "fc3"]],
    55230  => ["Far Cry 2", ["far cry 2", "fc2"]],

    // Dark Souls
    374320 => ["Dark Souls III", ["dark souls 3", "dark souls iii", "ds3"]],
    335300 => ["Dark Souls II", ["dark souls 2", "dark souls ii", "ds2"]],
    211420 => ["Dark Souls: Prepare to Die Edition", ["dark souls", "dark souls 1", "ds1"]],

    // Resident Evil
    2050650 => ["Resident Evil 4", ["resident evil 4", "re4"]],
    883710  => ["Resident Evil 2", ["resident evil 2", "re2"]],
    952060  => ["Resident Evil 3", ["resident evil 3", "re3"]],
    21690   => ["Resident Evil 5", ["resident evil 5", "re5"]],
    221040  => ["Resident Evil 6", ["resident evil 6", "re6"]],
    418370  => ["Resident Evil 7 Biohazard", ["resident evil 7", "re7", "biohazard 7"]],
    1196590 => ["Resident Evil Village", ["resident evil village", "re village", "re8"]],
    304240  => ["Resident Evil", ["resident evil 1", "re1"]],

    // DOOM
    379720 => ["DOOM", ["doom", "doom 2016"]],
    782330 => ["DOOM Eternal", ["doom eternal"]],
    2280   => ["DOOM II", ["doom 2", "doom ii"]],
    2300   => ["DOOM", ["doom 1", "doom"]],

    // Half-Life
    220 => ["Half-Life 2", ["half life 2", "hl2"]],
    70  => ["Half-Life", ["half life", "hl1"]],
    380 => ["Half-Life 2: Episode One", ["hl episode 1", "half life episode 1"]],
    420 => ["Half-Life 2: Episode Two", ["hl episode 2", "half life episode 2"]],

    // Portal
    620 => ["Portal 2", ["portal 2"]],
    400 => ["Portal", ["portal 1", "portal"]],

    // BioShock
    8870 => ["BioShock Infinite", ["bioshock infinite", "bioshock 3"]],
    409710 => ["BioShock Remastered", ["bioshock 1", "bioshock"]],
    409720 => ["BioShock 2 Remastered", ["bioshock 2"]],

    // Borderlands
    397540 => ["Borderlands 3", ["borderlands 3", "bl3"]],
    49520  => ["Borderlands 2", ["borderlands 2", "bl2"]],
    729040  => ["Borderlands Game of the Year Enhanced", ["borderlands 1", "bl1"]],

    // Cyberpunk
    1091500 => ["Cyberpunk 2077", ["cyberpunk", "cp2077", "cyberpunk 2077"]],

    // FromSoftware
    1245620 => ["Elden Ring", ["elden ring"]],
    814380  => ["Sekiro: Shadows Die Twice", ["sekiro"]],
    1235140 => ["Tekken 7", ["tekken 7"]],
    1778820 => ["TEKKEN 8", ["tekken 8"]],

    // Survival / RPG
    252490 => ["Rust", ["rust"]],
    892970 => ["Valheim", ["valheim"]],
    105600 => ["Terraria", ["terraria"]],
    413150 => ["Stardew Valley", ["stardew valley", "stardew"]],
    367520 => ["Hollow Knight", ["hollow knight"]],
    1086940 => ["Baldur's Gate 3", ["bg3", "baldurs gate 3", "baldur gate 3"]],
    1623730 => ["Palworld", ["palworld"]],
    239140 => ["Dying Light", ["dying light", "dl1"]],
    534380 => ["Dying Light 2", ["dying light 2", "dl2"]],
    374040 => ["Portal Knights", ["portal knights"]],

    // Horror
    381210 => ["Dead by Daylight", ["dbd", "dead by daylight"]],
    739630 => ["Phasmophobia", ["phasmophobia", "phasma"]],
    1966720 => ["Lethal Company", ["lethal company", "lethal"]],
    1097150 => ["Fall Guys", ["fall guys"]],
    945360 => ["Among Us", ["among us"]],

    // Valve
    730 => ["Counter-Strike 2", ["cs2", "cs go", "csgo", "counter strike", "counter strike 2"]],
    570 => ["Dota 2", ["dota", "dota 2"]],
    440 => ["Team Fortress 2", ["tf2", "team fortress 2"]],
    4000 => ["Garry's Mod", ["gmod", "garrys mod", "garry mod"]],

    // Open world
    1172620 => ["Sea of Thieves", ["sea of thieves", "sot"]],
    275850 => ["No Man's Sky", ["no mans sky", "nms"]],
    346110 => ["ARK: Survival Evolved", ["ark", "ark survival evolved"]],
    1621070 => ["ARK: Survival Ascended", ["ark survival ascended", "asa"]],

    // Metro
    286690 => ["Metro 2033 Redux", ["metro 2033", "metro"]],
    287390 => ["Metro: Last Light Redux", ["metro last light"]],
    1449560 => ["Metro Exodus", ["metro exodus"]],

    // Battlefield
    1238860 => ["Battlefield 4", ["bf4", "battlefield 4"]],
    1238880 => ["Battlefield 1", ["bf1", "battlefield 1"]],
    1238810 => ["Battlefield V", ["bf5", "battlefield 5"]],
    1517290 => ["Battlefield 2042", ["bf2042", "battlefield 2042"]],

    // Call of Duty
    1938090 => ["Call of Duty HQ", ["call of duty", "cod", "cod mw"]],
    202970 => ["Call of Duty: Black Ops II", ["black ops 2", "bo2", "cod bo2"]],
    42700 => ["Call of Duty: Black Ops", ["black ops", "bo1", "cod bo1"]],
    209660 => ["Call of Duty: Advanced Warfare", ["cod aw", "advanced warfare"]],

    // Sony
    1593500 => ["God of War", ["god of war", "gow"]],
    2322010 => ["God of War Ragnarök", ["god of war ragnarok", "gow ragnarok"]],
    1817070 => ["Marvel's Spider-Man Remastered", ["spiderman", "spider man", "spiderman remastered"]],
    1817190 => ["Marvel's Spider-Man: Miles Morales", ["miles morales", "spiderman miles morales"]],
    1151640 => ["Horizon Zero Dawn Complete Edition", ["horizon", "horizon zero dawn", "hzd"]],
    2420110 => ["Horizon Forbidden West Complete Edition", ["horizon forbidden west", "hfw"]],

    // Tomb Raider
    203160 => ["Tomb Raider", ["tomb raider 2013", "tomb raider"]],
    391220 => ["Rise of the Tomb Raider", ["rise tomb raider", "rise of the tomb raider"]],
    750920 => ["Shadow of the Tomb Raider", ["shadow tomb raider"]],

    // Mafia
    1030840 => ["Mafia: Definitive Edition", ["mafia 1", "mafia definitive"]],
    50130 => ["Mafia II", ["mafia 2", "mafia ii"]],
    360430 => ["Mafia III", ["mafia 3", "mafia iii"]],

    // Watch Dogs
    243470 => ["Watch Dogs", ["watch dogs", "watchdogs"]],
    447040 => ["Watch Dogs 2", ["watch dogs 2", "wd2"]],
    619150 => ["Watch Dogs: Legion", ["watch dogs legion"]],

    // Hitman
    1659040 => ["Hitman", ["hitman 3", "hitman 2021"]],
    236870 => ["HITMAN", ["hitman 2016", "hitman"]],
    203140 => ["Hitman: Absolution", ["hitman absolution"]],

    // Darksiders
    462780 => ["Darksiders Warmastered Edition", ["darksiders", "darksiders 1"]],
    388410 => ["Darksiders II Deathinitive Edition", ["darksiders 2"]],
    606280 => ["Darksiders III", ["darksiders 3"]],

    // Indie
    1145360 => ["Hades", ["hades"]],
    632360 => ["Risk of Rain 2", ["risk of rain 2", "ror2"]],
    588650 => ["Dead Cells", ["dead cells"]],
    504230 => ["Celeste", ["celeste"]],
    268910 => ["Cuphead", ["cuphead"]],
    391540 => ["Undertale", ["undertale"]],

    // Racing
    1551360 => ["Forza Horizon 5", ["forza 5", "fh5", "forza horizon 5"]],
    1293830 => ["Forza Horizon 4", ["forza 4", "fh4", "forza horizon 4"]],
    1237970 => ["Need for Speed Heat", ["nfs heat", "need for speed heat"]],
    1262540 => ["Need for Speed Unbound", ["nfs unbound", "need for speed unbound"]],
    244210 => ["Assetto Corsa", ["assetto corsa"]],
    284160 => ["BeamNG.drive", ["beamng", "beam ng"]],

    // Simulator
    227300 => ["Euro Truck Simulator 2", ["ets2", "euro truck 2", "ets 2"]],
    304730 => ["American Truck Simulator", ["ats", "american truck simulator"]],
    289070 => ["Sid Meier's Civilization VI", ["civilization 6", "civ 6", "civ vi"]],

    // Strategy
    236850 => ["Europa Universalis IV", ["eu4", "europa universalis 4"]],
    394360 => ["Hearts of Iron IV", ["hoi4", "hearts of iron 4"]],
    281990 => ["Stellaris", ["stellaris"]],
    255710 => ["Cities: Skylines", ["cities skylines"]],
    949230 => ["Cities: Skylines II", ["cities skylines 2", "cities 2"]],

    // More
    294100 => ["RimWorld", ["rimworld"]],
    1326470 => ["Sons of the Forest", ["sons of the forest", "son of the forest"]],
    751780 => ["Cursed Castilla", ["cursed castilla"]],
    899770 => ["Last Epoch", ["last epoch"]],
    238960 => ["Path of Exile", ["poe", "path of exile"]],
    2694490 => ["Path of Exile 2", ["poe 2", "path of exile 2"]],
    8930 => ["Sid Meier's Civilization V", ["civilization 5", "civ 5"]],
    648800 => ["Raft", ["raft"]],
    1449850 => ["Yu-Gi-Oh! Master Duel", ["yugioh", "master duel"]],
    1172470 => ["Apex Legends", ["apex", "apex legends"]],
    578080 => ["PUBG: Battlegrounds", ["pubg", "playerunknown battlegrounds"]],
    252950 => ["Rocket League", ["rocket league", "rl"]],
    1240440 => ["Halo Infinite", ["halo infinite"]],
    976730 => ["Halo: The Master Chief Collection", ["halo mcc"]],
    438100 => ["VRChat", ["vrchat"]]
];

/*
==========================================================
 FUNKCJE
==========================================================
*/

function normalizeText($text)
{
    $text = mb_strtolower(trim($text), "UTF-8");
    $replace = [
        "ą"=>"a","ć"=>"c","ę"=>"e","ł"=>"l","ń"=>"n",
        "ó"=>"o","ś"=>"s","ź"=>"z","ż"=>"z"
    ];
    $text = strtr($text, $replace);
    $text = preg_replace('/[^a-z0-9 ]/', '', $text);
    $text = preg_replace('/\s+/', ' ', $text);
    return trim($text);
}

function getSeries($title)
{
    $title = normalizeText($title);
    if (strpos($title, "grand theft auto") !== false || strpos($title, "gta") !== false) return "GTA";
    if (strpos($title, "witcher") !== false || strpos($title, "wiedzmin") !== false) return "Witcher";
    if (strpos($title, "red dead redemption") !== false || strpos($title, "rdr") !== false) return "Red Dead Redemption";
    if (strpos($title, "elder scrolls") !== false || strpos($title, "skyrim") !== false || strpos($title, "oblivion") !== false || strpos($title, "morrowind") !== false) return "Elder Scrolls";
    if (strpos($title, "fallout") !== false) return "Fallout";
    if (strpos($title, "assassin") !== false) return "Assassin's Creed";
    if (strpos($title, "far cry") !== false) return "Far Cry";
    if (strpos($title, "dark souls") !== false) return "Dark Souls";
    if (strpos($title, "resident evil") !== false) return "Resident Evil";
    if (strpos($title, "doom") !== false) return "DOOM";
    if (strpos($title, "half life") !== false) return "Half-Life";
    if (strpos($title, "portal") !== false) return "Portal";
    if (strpos($title, "bioshock") !== false) return "BioShock";
    if (strpos($title, "borderlands") !== false) return "Borderlands";
    if (strpos($title, "cyberpunk") !== false) return "Cyberpunk";
    if (strpos($title, "tekken") !== false) return "Tekken";
    if (strpos($title, "dying light") !== false) return "Dying Light";
    if (strpos($title, "ark") !== false) return "ARK";
    if (strpos($title, "metro") !== false) return "Metro";
    if (strpos($title, "battlefield") !== false) return "Battlefield";
    if (strpos($title, "call of duty") !== false) return "Call of Duty";
    if (strpos($title, "god of war") !== false) return "God of War";
    if (strpos($title, "spider man") !== false) return "Spider-Man";
    if (strpos($title, "horizon") !== false) return "Horizon";
    if (strpos($title, "tomb raider") !== false) return "Tomb Raider";
    if (strpos($title, "mafia") !== false) return "Mafia";
    if (strpos($title, "watch dogs") !== false) return "Watch Dogs";
    if (strpos($title, "hitman") !== false) return "Hitman";
    if (strpos($title, "darksiders") !== false) return "Darksiders";
    if (strpos($title, "forza") !== false) return "Forza";
    if (strpos($title, "need for speed") !== false) return "Need for Speed";
    if (strpos($title, "civilization") !== false) return "Civilization";
    if (strpos($title, "path of exile") !== false) return "Path of Exile";
    if (strpos($title, "halo") !== false) return "Halo";

    return $title;
}

function cleanHint($description, $title, $aliases = [])
{
    $wordsToHide = array_merge([$title], $aliases);
    $series = getSeries($title);
    if ($series) {
        $wordsToHide[] = $series;
    }

    $titleParts = explode(" ", $title);
    foreach ($titleParts as $part) {
        if (mb_strlen($part) > 3) {
            $wordsToHide[] = $part;
        }
    }

    usort($wordsToHide, function($a, $b) {
        return mb_strlen($b) - mb_strlen($a);
    });

    foreach ($wordsToHide as $word) {
        $word = trim($word);
        if (mb_strlen($word) < 2) continue;
        $pattern = '/' . preg_quote($word, '/') . '/iu';
        $description = preg_replace($pattern, '█████', $description);
    }

    return $description;
}

function getGame($id)
{
    $url = "https://store.steampowered.com/api/appdetails?appids=" . intval($id) . "&l=polish";
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 8,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_USERAGENT => "GuessTheGame/1.0",
        CURLOPT_SSL_VERIFYPEER => true
    ]);

    $result = curl_exec($ch);
    curl_close($ch);

    if (!$result) return null;
    $json = json_decode($result, true);

    if (!isset($json[$id]) || !$json[$id]["success"]) return null;

    $data = $json[$id]["data"];
    $screenshots = [];

    foreach (($data["screenshots"] ?? []) as $shot) {
        if (!empty($shot["path_full"])) {
            $screenshots[] = $shot["path_full"];
        }
    }

    if (!$screenshots) return null;

    return [
        "id" => $id,
        "title" => $data["name"] ?? "Unknown",
        "description" => strip_tags($data["short_description"] ?? ""),
        "screenshots" => $screenshots,
        "developer" => $data["developers"][0] ?? "Nieznany",
        "genre" => !empty($data["genres"]) ? implode(", ", array_column($data["genres"], "description")) : "Nieznany",
        "release" => $data["release_date"]["date"] ?? "Nieznany"
    ];
}

function randomGame($games)
{
    $used = $_SESSION["used_games"] ?? [];
    $ids = array_keys($games);
    shuffle($ids);

    foreach ($ids as $id) {
        if (in_array($id, $used, true)) continue;
        $game = getGame($id);
        if ($game) {
            $_SESSION["used_games"][] = $id;
            return $game;
        }
    }
    return null;
}

function newRound($games)
{
    $game = randomGame($games);
    if (!$game) return false;

    $_SESSION["game"] = $game;
    $_SESSION["start"] = time();
    $_SESSION["answered"] = false;
    $_SESSION["hint"] = false;
    $_SESSION["message"] = "";
    $_SESSION["message_type"] = "";
    $_SESSION["lives"] = 3; // Przywrócenie 3 żyć dla każdej nowej gry/rundy

    return true;
}

function getFinalRating($correct, $maxRounds)
{
    $percentage = ($maxRounds > 0) ? ($correct / $maxRounds) * 100 : 0;

    if ($percentage >= 90) return ["title" => "LEGENDARNY WYNIK! 🏆", "text" => "Praktycznie bezbłędnie!", "class" => "legendary"];
    if ($percentage >= 75) return ["title" => "ŚWIETNIE! 🔥", "text" => "Bardzo dużo gier udało Ci się rozpoznać.", "class" => "great"];
    if ($percentage >= 55) return ["title" => "DOBRY WYNIK! 👍", "text" => "Naprawdę nieźle!", "class" => "good"];
    if ($percentage >= 40) return ["title" => "ŚREDNIO 😎", "text" => "Część gier rozpoznana.", "class" => "average"];
    if ($percentage >= 20) return ["title" => "SŁABO 😅", "text" => "Kilka gier udało się rozpoznać.", "class" => "weak"];

    return ["title" => "MUSISZ POTRENOWAĆ 💀", "text" => "Tym razem było naprawdę trudno.", "class" => "bad"];
}

/*
==========================================================
 OBSŁUGA SESJI & TRYBÓW
==========================================================
*/

if (isset($_POST["select_mode"])) {
    $_SESSION["game_mode"] = $_POST["select_mode"];
    $_SESSION["max_rounds"] = intval($_POST["max_rounds"] ?? 20);
    $_SESSION["score"] = 0; // Zerowanie punktów po rozpoczęciu nowej gry
    $_SESSION["round"] = 1;
    $_SESSION["lives"] = 3; // Standardowe 3 życia
    $_SESSION["correct"] = 0;
    $_SESSION["results"] = [];
    $_SESSION["used_games"] = [];
    $_SESSION["quiz_finished"] = false;
    newRound($games);
}

// Inicjalizacja bezpiecznych zmiennych sesji
if (!isset($_SESSION["score"])) $_SESSION["score"] = 0;
if (!isset($_SESSION["round"])) $_SESSION["round"] = 1;
if (!isset($_SESSION["lives"])) $_SESSION["lives"] = 3;
if (!isset($_SESSION["correct"])) $_SESSION["correct"] = 0;
if (!isset($_SESSION["results"])) $_SESSION["results"] = [];
if (!isset($_SESSION["used_games"])) $_SESSION["used_games"] = [];
if (!isset($_SESSION["quiz_finished"])) $_SESSION["quiz_finished"] = false;
if (!isset($_SESSION["max_rounds"])) $_SESSION["max_rounds"] = 20;

$game_mode = $_SESSION["game_mode"] ?? null;
$max_rounds = $_SESSION["max_rounds"] ?? 20;
$quiz_finished = $_SESSION["quiz_finished"] ?? false;

/*
==========================================================
 RESET / ZMIANA TRYBU
==========================================================
*/

if (isset($_POST["reset"])) {
    $_SESSION["score"] = 0; // Zerowanie punktów
    $_SESSION["round"] = 1;
    $_SESSION["lives"] = 3;
    $_SESSION["correct"] = 0;
    $_SESSION["results"] = [];
    $_SESSION["used_games"] = [];
    $_SESSION["quiz_finished"] = false;
    newRound($games);
}

if (isset($_POST["change_mode"])) {
    unset($_SESSION["game_mode"]);
    unset($_SESSION["game"]);
    $_SESSION["score"] = 0; // Zerowanie punktów
    $game_mode = null;
}

/*
==========================================================
 SKIP (POMINIĘCIE RUNDY)
==========================================================
*/

if (isset($_POST["skip"]) && !($_SESSION["answered"] ?? false) && !$quiz_finished) {
    $_SESSION["answered"] = true;
    $_SESSION["message"] = "⏭ Pominięto! Poprawna odpowiedź to: " . ($_SESSION["game"]["title"] ?? "Nieznana");
    $_SESSION["message_type"] = "wrong";

    $_SESSION["results"][] = [
        "title" => $_SESSION["game"]["title"] ?? "",
        "answer" => "Pominięto ⏭️",
        "correct" => false,
        "series" => getSeries($_SESSION["game"]["title"] ?? "")
    ];
}

/*
==========================================================
 NASTĘPNA RUNDA
==========================================================
*/

if (isset($_POST["next"]) && !$quiz_finished) {
    if ($game_mode === "normal" && $_SESSION["round"] >= $max_rounds) {
        $_SESSION["quiz_finished"] = true;
        $quiz_finished = true;
    } else {
        $_SESSION["round"]++;
        newRound($games);
    }
}

/*
==========================================================
 PODPOWIEDŹ (KUPNO ZA 500 PKT)
==========================================================
*/

if (isset($_POST["hint"]) && !($_SESSION["answered"] ?? false) && !$quiz_finished) {
    if (!($_SESSION["hint"] ?? false)) {
        if ($_SESSION["score"] >= 500) {
            $_SESSION["hint"] = true;
            $_SESSION["score"] -= 500;
            $_SESSION["message"] = "💡 Odblokowano podpowiedź!";
            $_SESSION["message_type"] = "success";
        } else {
            $_SESSION["message"] = "⚠️ Potrzebujesz co najmniej 500 punktów na podpowiedź!";
            $_SESSION["message_type"] = "wrong";
        }
    }
}

/*
==========================================================
 ODZYSKANIE ŻYCIA (KUPNO ZA 300 PKT)
==========================================================
*/

if (isset($_POST["recover"]) && !($_SESSION["answered"] ?? false) && !$quiz_finished) {
    if ($_SESSION["lives"] >= 3) {
        $_SESSION["message"] = "⚠️ Masz już maksymalną liczbę żyć (3)!";
        $_SESSION["message_type"] = "wrong";
    } elseif ($_SESSION["score"] < 300) {
        $_SESSION["message"] = "⚠️ Potrzebujesz co najmniej 300 punktów, aby dokupić życie!";
        $_SESSION["message_type"] = "wrong";
    } else {
        $_SESSION["score"] -= 300;
        $_SESSION["lives"]++;
        $_SESSION["message"] = "❤️ Dokupiono 1 życie! (Pozostało " . $_SESSION["score"] . " pkt)";
        $_SESSION["message_type"] = "success";
    }
}

/*
==========================================================
 SPRAWDZENIE ODPOWIEDZI
==========================================================
*/

if (isset($_POST["answer"]) && !($_SESSION["answered"] ?? false) && $_SESSION["lives"] > 0 && !$quiz_finished) {
    $answer = normalizeText($_POST["answer"]);
    $title = normalizeText($_SESSION["game"]["title"]);
    $id = $_SESSION["game"]["id"];

    $aliases = isset($games[$id]) ? $games[$id][1] : [];
    $normalizedAliases = array_map("normalizeText", $aliases);

    $correct = false;

    if ($answer === $title) {
        $correct = true;
    } elseif (in_array($answer, $normalizedAliases, true)) {
        $correct = true;
    } elseif (strlen($answer) >= 3 && strpos($title, $answer) !== false) {
        $correct = true;
    }

    if ($correct) {
        $elapsed = time() - $_SESSION["start"];
        $points = 500;
        $bonus = max(0, 300 - ($elapsed * 5));
        $points += $bonus;
        $points = max(100, $points);

        $_SESSION["score"] += $points;
        $_SESSION["correct"]++;
        $_SESSION["answered"] = true;
        $_SESSION["message"] = "DOBRZE! +" . $points . " PKT";
        $_SESSION["message_type"] = "success";

        $_SESSION["results"][] = [
            "title" => $_SESSION["game"]["title"],
            "answer" => $_SESSION["game"]["title"],
            "correct" => true,
            "series" => getSeries($_SESSION["game"]["title"])
        ];
    } else {
        $_SESSION["lives"]--;

        // Sprawdzenie czy gracz podał tę samą serię
        $targetSeries = getSeries($_SESSION["game"]["title"]);
        $isSameSeries = false;

        foreach ($games as $gId => $gData) {
            $gTitle = normalizeText($gData[0]);
            $gAliases = array_map("normalizeText", $gData[1]);

            if ($answer === $gTitle || in_array($answer, $gAliases, true) || (strlen($answer) >= 3 && strpos($gTitle, $answer) !== false)) {
                $guessedSeries = getSeries($gData[0]);
                if ($guessedSeries !== "" && $guessedSeries === $targetSeries) {
                    $isSameSeries = true;
                    break;
                }
            }
        }

        if (!$isSameSeries && $targetSeries !== "") {
            $normSeries = normalizeText($targetSeries);
            if ($normSeries !== "" && strpos($answer, $normSeries) !== false) {
                $isSameSeries = true;
            }
        }

        if ($_SESSION["lives"] <= 0) {
            $_SESSION["lives"] = 0;
            $_SESSION["answered"] = true;
            $_SESSION["message"] = "💀 SKOŃCZYŁY SIĘ PRÓBY! Poprawna odpowiedź: " . $_SESSION["game"]["title"];
            $_SESSION["message_type"] = "danger";

            $_SESSION["results"][] = [
                "title" => $_SESSION["game"]["title"],
                "answer" => $_POST["answer"] ?? "",
                "correct" => false,
                "series" => $targetSeries
            ];

            if ($game_mode === "endless") {
                $_SESSION["quiz_finished"] = true;
                $quiz_finished = true;
            }
        } else {
            if ($isSameSeries) {
                $_SESSION["message"] = "🟨 Ta sama seria! (" . $targetSeries . ") - Spróbuj innej części!";
                $_SESSION["message_type"] = "series_warn";
            } else {
                $_SESSION["message"] = "❌ Nie tym razem!";
                $_SESSION["message_type"] = "wrong";
            }
        }
    }
}

/*
==========================================================
 DANE DO WIDOKU
==========================================================
*/

$game = $_SESSION["game"] ?? null;
$hint = $_SESSION["hint"] ?? false;
$answered = $_SESSION["answered"] ?? false;
$message = $_SESSION["message"] ?? "";
$messageType = $_SESSION["message_type"] ?? "";
$finalRating = getFinalRating($_SESSION["correct"], $max_rounds);

$autocomplete = [];
foreach ($games as $id => $data) {
    $autocomplete[] = [
        "id" => $id,
        "title" => $data[0],
        "aliases" => $data[1]
    ];
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GuessTheGame</title>
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }
:root {
    --bg: #070812;
    --card: #111522;
    --purple: #8b5cf6;
    --purple2: #6d28d9;
    --green: #22c55e;
    --red: #ef4444;
    --yellow: #f59e0b;
    --text: #fff;
    --muted: #8f96aa;
}

body {
    min-height: 100vh;
    padding: 25px;
    color: var(--text);
    font-family: Inter, Arial, sans-serif;
    background: radial-gradient(circle at 50% -10%, #422477 0%, #14162a 38%, #070812 75%);
}

.header {
    max-width: 1200px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.logo { font-size: 27px; font-weight: 900; }
.logo span { color: var(--purple); }
.header-info { display: flex; gap: 10px; }
.badge {
    padding: 10px 15px;
    border-radius: 12px;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.08);
    font-weight: bold;
}

.container { max-width: 1200px; margin: auto; }

/* TRYBY GRY */
.mode-selection {
    text-align: center;
    padding: 40px 20px;
}

.mode-title { font-size: 36px; font-weight: 900; margin-bottom: 10px; }
.mode-subtitle { color: var(--muted); margin-bottom: 40px; }

.mode-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 25px;
    max-width: 850px;
    margin: 0 auto;
}

.mode-card {
    background: rgba(17, 21, 34, 0.85);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 20px;
    padding: 30px 20px;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.mode-card:hover {
    transform: translateY(-5px);
    border-color: var(--purple);
    box-shadow: 0 15px 30px rgba(139, 92, 246, 0.25);
}

.mode-card-icon {
    font-size: 60px;
    margin-bottom: 15px;
    background: rgba(139, 92, 246, 0.1);
    width: 90px;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 2px solid rgba(139, 92, 246, 0.3);
}

.mode-card h2 { font-size: 24px; margin-bottom: 10px; }
.mode-card p { color: var(--muted); font-size: 14px; line-height: 1.5; margin-bottom: 20px; }

.round-selector {
    display: flex; gap: 10px; margin-bottom: 20px; width: 100%; justify-content: center;
}

.round-option {
    flex: 1; padding: 10px; background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1); border-radius: 10px;
    cursor: pointer; text-align: center; font-size: 13px; font-weight: bold; transition: 0.2s;
}

.round-option input { display: none; }
.round-option:has(input:checked) {
    background: var(--purple); border-color: var(--purple2); color: white;
}

.mode-btn {
    padding: 14px 25px; border-radius: 12px; border: none;
    background: linear-gradient(135deg, var(--purple), var(--purple2));
    color: white; font-weight: bold; cursor: pointer; width: 100%;
}

/* WIDOK GRA */
.game {
    padding: 20px; border-radius: 25px;
    background: rgba(13,16,29,.96); border: 1px solid rgba(255,255,255,.08);
    box-shadow: 0 30px 100px rgba(0,0,0,.5);
}

.image-box {
    position: relative; width: 100%; height: 500px;
    overflow: hidden; border-radius: 18px; background: #050509;
}

.image-box img {
    width: 100%; height: 100%; object-fit: cover;
    filter: brightness(.68) saturate(.9); transition: .5s;
}

.image-box:hover img { transform: scale(1.02); }

.image-overlay {
    position: absolute; inset: 0; display: flex;
    align-items: flex-end; padding: 25px;
    background: linear-gradient(transparent 45%, rgba(0,0,0,.85));
}

.overlay-text {
    padding: 10px 14px; border-radius: 10px;
    background: rgba(0,0,0,.6); font-size: 13px; color: #ddd;
}

.thumbnails {
    display: flex; gap: 10px; margin-top: 12px; overflow-x: auto;
}

.thumbnail {
    width: 120px; height: 70px; object-fit: cover;
    border-radius: 9px; opacity: .5; cursor: pointer; border: 2px solid transparent;
}

.thumbnail:hover, .thumbnail.active { opacity: 1; border-color: var(--purple); }

.question { text-align: center; margin: 30px 0 20px; }
.question small { color: var(--purple); text-transform: uppercase; letter-spacing: 2px; font-weight: bold; }
.question h1 { font-size: 38px; margin-top: 8px; }

.info-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 12px; margin-bottom: 18px;
}

.info {
    padding: 16px; border-radius: 14px;
    background: rgba(255,255,255,.035); border: 1px solid rgba(255,255,255,.07);
}

.info-label { color: var(--muted); font-size: 11px; text-transform: uppercase; margin-bottom: 6px; }
.info-value { font-weight: bold; }

/* SKLEP / PRZYCISKI AKCJI */
.shop-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 12px; margin-bottom: 15px;
}

.shop-btn {
    width: 100%; padding: 14px; border-radius: 13px;
    cursor: pointer; font-weight: bold; font-size: 14px;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    transition: 0.2s ease;
}

.hint-btn {
    border: 1px solid rgba(139,92,246,.3);
    background: rgba(139,92,246,.12); color: #c4b5fd;
}
.hint-btn:hover { background: rgba(139,92,246,.25); }

.life-btn {
    border: 1px solid rgba(34,197,94,.3);
    background: rgba(34,197,94,.12); color: #86efac;
}
.life-btn:hover { background: rgba(34,197,94,.25); }

.shop-btn:disabled {
    opacity: 0.4; cursor: not-allowed;
}

.hint {
    margin-bottom: 15px; padding: 15px; border-radius: 12px;
    background: rgba(139,92,246,.1); color: #ddd; line-height: 1.6;
}

.answer-area { position: relative; margin-top: 15px; }
.answer-form { display: flex; gap: 10px; }
.answer {
    flex: 1; padding: 18px; border-radius: 13px;
    border: 1px solid #2a3047; background: #080a13;
    color: white; outline: none; font-size: 17px;
}

.answer:focus {
    border-color: var(--purple); box-shadow: 0 0 0 3px rgba(139,92,246,.15);
}

.submit, .skip-btn {
    padding: 0 25px; border: none; border-radius: 13px;
    font-weight: 900; cursor: pointer; display: flex;
    align-items: center; justify-content: center;
}

.submit { background: linear-gradient(135deg,var(--purple),var(--purple2)); color: white; }
.skip-btn { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1); color: #ddd; }
.skip-btn:hover { background: rgba(255,255,255,0.15); }

.suggestions {
    position: absolute; left: 0; right: 200px;
    top: calc(100% + 8px); z-index: 20; overflow: hidden;
    border-radius: 13px; background: #151927;
    border: 1px solid rgba(255,255,255,.1);
    box-shadow: 0 20px 50px rgba(0,0,0,.5); display: none;
}

.suggestion {
    display: flex; align-items: center; gap: 12px;
    padding: 13px 15px; cursor: pointer; border-bottom: 1px solid rgba(255,255,255,.05);
}

.suggestion:hover { background: rgba(139,92,246,.15); }
.suggestion-icon {
    width: 34px; height: 34px; display: flex;
    align-items: center; justify-content: center;
    border-radius: 8px; background: rgba(139,92,246,.15);
}

.message {
    margin-top: 15px; padding: 16px; border-radius: 13px;
    text-align: center; font-weight: bold;
}
.message.success { background: rgba(34,197,94,.12); color: #86efac; }
.message.wrong { background: rgba(239,68,68,.1); color: #fca5a5; }
.message.series_warn { background: rgba(245, 158, 11, 0.15); color: #fcd34d; border: 1px solid rgba(245, 158, 11, 0.3); }
.message.danger { background: rgba(239,68,68,.18); color: #f87171; }

.bottom {
    display: flex; justify-content: space-between;
    align-items: center; margin-top: 20px;
}

.timer { color: #c4b5fd; font-weight: bold; font-size: 18px; }

.next, .reset, .restart-final, .mode-change {
    padding: 13px 22px; border: none; border-radius: 12px;
    color: white; cursor: pointer; font-weight: bold;
}

.next, .restart-final { background: linear-gradient(135deg,var(--purple),var(--purple2)); }
.reset, .mode-change { background: #24283b; }

.footer { text-align: center; color: var(--muted); margin-top: 15px; font-size: 13px; }

/* POPUP POPRAWNEJ ODPOWIEDZI */
.correct-overlay {
    position: fixed; inset: 0; z-index: 100;
    display: flex; align-items: center; justify-content: center;
    background: rgba(0,0,0,.7); backdrop-filter: blur(5px);
}
.correct-box { text-align: center; animation: thumbsUp .6s cubic-bezier(.17,.67,.3,1.4); }
.correct-icon { font-size: 130px; }
.correct-title { margin-top: 10px; font-size: 42px; font-weight: 1000; color: #86efac; }
.correct-points { margin-top: 10px; font-size: 22px; color: white; }

@keyframes thumbsUp {
    0% { transform: scale(.2) rotate(-15deg); opacity: 0; }
    60% { transform: scale(1.1) rotate(5deg); opacity: 1; }
    100% { transform: scale(1) rotate(0); opacity: 1; }
}

/* PODSUMOWANIE WYNIKÓW */
.final-result {
    padding: 45px 30px; border-radius: 25px;
    background: rgba(13,16,29,.97); border: 1px solid rgba(255,255,255,.08);
    box-shadow: 0 30px 100px rgba(0,0,0,.5); text-align: center;
}
.final-icon { font-size: 90px; margin-bottom: 10px; }
.final-round { color: var(--purple); font-size: 13px; font-weight: 900; letter-spacing: 3px; }
.final-result h1 { margin-top: 10px; font-size: 36px; }
.final-score {
    margin-top: 20px; font-size: 72px; font-weight: 1000;
    background: linear-gradient(135deg, #a78bfa, #7c3aed);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}
.final-text { margin-top: 8px; color: #c4c8d5; font-size: 18px; }
.final-percent { margin-top: 8px; color: var(--muted); }

.results-list { max-width: 800px; margin: 30px auto; text-align: left; }
.result-row {
    display: grid; grid-template-columns: 45px 1fr auto; gap: 10px; align-items: center;
    padding: 13px 15px; margin-bottom: 7px; border-radius: 10px; border: 1px solid rgba(255,255,255,.05);
}
.result-correct { background: rgba(34,197,94,.10); border-color: rgba(34,197,94,.2); }
.result-wrong { background: rgba(239,68,68,.10); border-color: rgba(239,68,68,.2); }
.result-series { background: rgba(245,158,11,.13); border-color: rgba(245,158,11,.35); }
.result-correct strong { color: #86efac; }
.result-wrong strong { color: #fca5a5; }
.result-series strong { color: #fcd34d; }
.series-info { display: block; color: #fbbf24; font-size: 11px; margin-top: 3px; }

@media(max-width:800px) {
    body { padding: 12px; }
    .header { margin-bottom: 15px; }
    .logo { font-size: 20px; }
    .badge { padding: 8px; font-size: 11px; }
    .game { padding: 12px; }
    .image-box { height: 280px; }
    .question h1 { font-size: 28px; }
    .info-grid { grid-template-columns: repeat(2,1fr); }
    .shop-grid { grid-template-columns: 1fr; }
    .answer-form { flex-direction: column; }
    .submit, .skip-btn { height: 54px; }
    .suggestions { right: 0; }
    .bottom { flex-wrap: wrap; gap: 10px; }
}
</style>
</head>
<body>

<header class="header">
    <div class="logo">
        Guess<span>TheGame</span>
    </div>

    <div class="header-info">
        <div class="badge">
            🏆 <?= $_SESSION["score"] ?> pkt
        </div>
        <div class="badge">
            🎯 <?= ($game_mode === "normal") ? min($_SESSION["round"], $max_rounds) . "/" . $max_rounds : "Runda " . $_SESSION["round"] ?>
        </div>
    </div>
</header>

<main class="container">

<?php if (!$game_mode): ?>

<!-- ========================================================== EKRAN WYBORU TRYBU ========================================================== -->
<div class="mode-selection">
    <h1 class="mode-title">Wybierz Tryb Gry</h1>
    <p class="mode-subtitle">Zdecyduj jak chcesz dzisiaj przetestować swoją wiedzę o grach!</p>

    <div class="mode-grid">
        <form method="POST" class="mode-card">
            <div class="mode-card-icon">🏅</div>
            <h2>Tryb Normal</h2>
            <p>Wybierz długość rozgrywki. Odgadnij jak najwięcej gier i zdobądź najwyższy wynik!</p>

            <div class="round-selector">
                <label class="round-option">
                    <input type="radio" name="max_rounds" value="10"> 10 RUND
                </label>
                <label class="round-option">
                    <input type="radio" name="max_rounds" value="15"> 15 RUND
                </label>
                <label class="round-option">
                    <input type="radio" name="max_rounds" value="20" checked> 20 RUND
                </label>
            </div>

            <button type="submit" name="select_mode" value="normal" class="mode-btn">Graj Normal</button>
        </form>

        <form method="POST" class="mode-card">
            <div class="mode-card-icon">♾️</div>
            <h2>Tryb Endless</h2>
            <p>Nieskończona liczba rund. Graj dopóki nie stracisz wszystkich żyć i ustanów swój rekord!</p>
            <div style="height: 48px;"></div>
            <button type="submit" name="select_mode" value="endless" class="mode-btn">Graj Bez Końca</button>
        </form>
    </div>
</div>

<?php elseif ($quiz_finished): ?>

<!-- ========================================================== PODSUMOWANIE WYNIKÓW ========================================================== -->
<div class="final-result">
    <div class="final-icon">🏆</div>
    <div class="final-round">QUIZ ZAKOŃCZONY (<?= $game_mode === "normal" ? "TRYB NORMAL - " . $max_rounds . " RUND" : "TRYB ENDLESS" ?>)</div>

    <h1><?= htmlspecialchars($finalRating["title"]) ?></h1>

    <div class="final-score">
        <?= $_SESSION["correct"] ?> <?= $game_mode === "normal" ? "/ " . $max_rounds : "zgadniętych" ?>
    </div>

    <p class="final-text"><?= htmlspecialchars($finalRating["text"]) ?></p>

    <div class="final-percent">
        Wynik końcowy: <strong><?= $_SESSION["score"] ?></strong> punktów
    </div>

    <div class="results-list">
        <?php
        $previousSeries = null;
        foreach ($_SESSION["results"] as $index => $result):
            $sameSeries = $previousSeries !== null && $previousSeries === $result["series"];

            if ($sameSeries) {
                $rowClass = "result-series";
                $status = "🟡 TA SAMA SERIA";
            } elseif ($result["correct"]) {
                $rowClass = "result-correct";
                $status = "🟢 POPRAWNA";
            } else {
                $rowClass = "result-wrong";
                $status = "🔴 BŁĘDNA / SKIP";
            }
        ?>
        <div class="result-row <?= $rowClass ?>">
            <span><?= $index + 1 ?>.</span>
            <strong>
                <?= htmlspecialchars($result["title"]) ?>
                <span class="series-info"><?= htmlspecialchars($result["series"]) ?></span>
            </strong>
            <span><?= $status ?></span>
        </div>
        <?php
            $previousSeries = $result["series"];
        endforeach;
        ?>
    </div>

    <form method="POST" style="display:flex; justify-content:center; gap:10px;">
        <button class="restart-final" name="reset" type="submit">🔄 ZAGRAJ PONOWNIE</button>
        <button class="mode-change" name="change_mode" type="submit">⚙️ ZMIEŃ TRYB</button>
    </form>
</div>

<?php else: ?>

<!-- ========================================================== EKRAN ROZGRYWKI ========================================================== -->
<div class="game">

<div class="image-box">
    <img id="mainImage" src="<?= htmlspecialchars($game["screenshots"][0] ?? "") ?>" alt="Screenshot gry">
    <div class="image-overlay">
        <div class="overlay-text">🎮 Rozpoznaj grę po screenie</div>
    </div>
</div>

<div class="thumbnails">
<?php
foreach (array_slice($game["screenshots"] ?? [], 0, 6) as $index => $image) {
?>
<img class="thumbnail <?= $index === 0 ? "active" : "" ?>" src="<?= htmlspecialchars($image) ?>" onclick="changeImage(this, '<?= htmlspecialchars($image, ENT_QUOTES) ?>')" alt="Screenshot">
<?php } ?>
</div>

<div class="question">
    <small><?= $game_mode === "normal" ? "Runda " . $_SESSION["round"] . " / " . $max_rounds : "Runda " . $_SESSION["round"] ?> (<?= strtoupper($game_mode) ?>)</small>
    <h1>Jaka to gra?</h1>
</div>

<div class="info-grid">
    <div class="info">
        <div class="info-label">👨‍💻 Developer</div>
        <div class="info-value"><?= htmlspecialchars($game["developer"] ?? "Nieznany") ?></div>
    </div>
    <div class="info">
        <div class="info-label">🎭 Gatunek</div>
        <div class="info-value"><?= htmlspecialchars($game["genre"] ?? "Nieznany") ?></div>
    </div>
    <div class="info">
        <div class="info-label">📅 Premiera</div>
        <div class="info-value"><?= htmlspecialchars($game["release"] ?? "Nieznany") ?></div>
    </div>
    <div class="info">
        <div class="info-label">❤️ Próby (Życia)</div>
        <div class="info-value">
            <?php for ($i = 0; $i < 3; $i++) { echo $i < $_SESSION["lives"] ? "❤️" : "🖤"; } ?>
        </div>
    </div>
</div>

<!-- SKLEP (PODPOWIEDŹ + KUPNO ŻYCIA) -->
<?php if (!$answered): ?>
<div class="shop-grid">
    <form method="POST">
        <button class="shop-btn hint-btn" name="hint" type="submit" <?= ($hint || $_SESSION["score"] < 500) ? "disabled" : "" ?>>
            💡 <?= $hint ? "Podpowiedź aktywna" : "Kup podpowiedź (500 pkt)" ?>
        </button>
    </form>

    <form method="POST">
        <button class="shop-btn life-btn" name="recover" type="submit" <?= ($_SESSION["lives"] >= 3 || $_SESSION["score"] < 250) ? "disabled" : "" ?>>
            ❤️ Dokup +1 życie (250 pkt)
        </button>
    </form>
</div>
<?php endif; ?>

<?php if ($hint): ?>
<div class="hint">
    💡 <?= htmlspecialchars(cleanHint($game["description"] ?? "", $game["title"] ?? "", $games[$game["id"] ?? 0][1] ?? [])) ?>
</div>
<?php endif; ?>

<?php if (!$answered && $_SESSION["lives"] > 0): ?>
<div class="answer-area">
<form method="POST" class="answer-form" autocomplete="off">
    <input id="answer" class="answer" type="text" name="answer" placeholder="Np. GTA 5, Witcher 3, RDR2..." autocomplete="off" autofocus required>
    <button class="submit" type="submit">ZGADNIJ</button>
    <button class="skip-btn" type="submit" name="skip" formnovalidate>⏭️ SKIP</button>
</form>
<div id="suggestions" class="suggestions"></div>
</div>
<?php endif; ?>

<?php if ($message): ?>
<div class="message <?= htmlspecialchars($messageType) ?>">
    <?= htmlspecialchars($message) ?>
</div>
<?php endif; ?>

<div class="bottom">
    <div class="timer">
        ⏱️ <span id="timer">00:00</span>
    </div>

    <?php if ($answered): ?>
    <form id="nextForm" method="POST">
        <!-- Ukryty input gwarantujący poprawne przesłanie formularza przez JS -->
        <input type="hidden" name="next" value="1">
        <button class="next" type="submit">
            <?= ($game_mode === "normal" && $_SESSION["round"] >= $max_rounds) ? "🏆 ZOBACZ WYNIK" : "🎮 NASTĘPNA GRA →" ?>
        </button>
    </form>
    <?php endif; ?>

    <form method="POST" style="display:flex; gap:8px;">
        <button class="reset" name="reset" type="submit">🔄 Reset</button>
        <button class="mode-change" name="change_mode" type="submit">⚙️ Tryby</button>
    </form>
</div>

</div>

<div class="footer">
    GuessTheGame • <?= $game_mode === "normal" ? $max_rounds . " rund" : "Endless Mode" ?> • <?= count($games) ?>+ gier
</div>

<?php endif; ?>

</main>

<?php if (!$quiz_finished && $messageType === "success" && $answered): ?>
<div id="correctOverlay" class="correct-overlay">
    <div class="correct-box">
        <div class="correct-icon">👍</div>
        <div class="correct-title">DOBRZE!</div>
        <div class="correct-points"><?= htmlspecialchars($message) ?></div>
    </div>
</div>
<script>
// Automatyczne przechodzenie po 1.2 sekundy
setTimeout(function() {
    const nextForm = document.getElementById("nextForm");
    if (nextForm) {
        nextForm.submit();
    }
}, 1200);
</script>
<?php endif; ?>

<script>
const startTime = <?= intval($_SESSION["start"] ?? time()) ?>;
const answered = <?= $answered ? "true" : "false" ?>;

function updateTimer() {
    if (answered) return;
    const timer = document.getElementById("timer");
    if (!timer) return;

    const now = Math.floor(Date.now() / 1000);
    let seconds = Math.max(0, now - startTime);

    let minutes = Math.floor(seconds / 60);
    let secs = seconds % 60;

    timer.innerText = String(minutes).padStart(2, "0") + ":" + String(secs).padStart(2, "0");
}

setInterval(updateTimer, 1000);
updateTimer();

function changeImage(element, image) {
    document.getElementById("mainImage").src = image;
    document.querySelectorAll(".thumbnail").forEach(el => el.classList.remove("active"));
    element.classList.add("active");
}

const gameList = <?= json_encode($autocomplete, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
const input = document.getElementById("answer");
const suggestions = document.getElementById("suggestions");

function normalizeJS(text) {
    return text.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").replace(/[^a-z0-9 ]/g, "").replace(/\s+/g, " ").trim();
}

if (input && suggestions) {
    input.addEventListener("input", function() {
        const value = normalizeJS(input.value);
        suggestions.innerHTML = "";

        if (value.length < 2) {
            suggestions.style.display = "none";
            return;
        }

        const matches = gameList.filter(game =>
            normalizeJS(game.title).includes(value) ||
            game.aliases.some(alias => normalizeJS(alias).includes(value))
        ).slice(0, 5);

        if (!matches.length) {
            suggestions.style.display = "none";
            return;
        }

        matches.forEach(game => {
            const item = document.createElement("div");
            item.className = "suggestion";

            const icon = document.createElement("div");
            icon.className = "suggestion-icon";
            icon.innerText = "🎮";

            const title = document.createElement("div");
            title.innerText = game.title;

            item.appendChild(icon);
            item.appendChild(title);

            item.addEventListener("click", function() {
                input.value = game.title;
                suggestions.style.display = "none";
                input.focus();
            });

            suggestions.appendChild(item);
        });

        suggestions.style.display = "block";
    });

    document.addEventListener("click", function(event) {
        if (!event.target.closest(".answer-area")) {
            suggestions.style.display = "none";
        }
    });
}
</script>

</body>
</html>