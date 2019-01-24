
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<meta charset="utf-8">

	<title>Statistic</title>
</head>
<body>

    <div class="header">
        <span id="sHeading">
            Fights and statistics
        </span>
    <a href="index.php">
        <h1 class="heading">
            <img id="logo" src="style/logo.jpg" alt="logo">
                Fight Club
        </h1>
     </a>

    </div>
    <div>
        <ul>

              <li><a class="active" href="index.php">Home</a></li>
              <li><a href="statistics.php">Statistic</a></li>

        </ul>
    </div>
    <div class="scroll-left">
        <p>˅˅˅˅˅˅˅˅˅ Choose your fighters and see statistic ˅˅˅˅˅˅˅˅˅</p>
    </div>

    <div>
        <form action="#" method="post">

                <input type="text" name="fighter_1" placeholder="first fighter">
                <input type="text" name="fighter_2" placeholder="second fighter">
                <input type="text" name="fighter_3" placeholder="third fighter">
                <input type="submit" value="Show complete statistic">

        </form>
        <span class="select">
                <?php
                $choise_fighters = [
                    'apprentice' => 'a',
                    'brute' => 'b',
                    'guardian' => 'g',
                ];
                foreach ($choise_fighters as $x => $y) {
                    echo "$x == $y,\n";

                }

                ?>
            </span>

    </div>

	<?php





    function masterVsFighters($f, $m)
    {
        $z = array_fill(0, 8, 0);
        foreach($f as $x)
        {
            switch($x)
            {
                case 'a':
                    $a = [5, 6, 2];
                    break;
                case 'b':
                    $a = [6, 8 ,2];
                    break;
                default:
                    $a = [8, 6, 5];
            }
            while ($m[0] > 0)
            {
                $m[0] -= $a[1] - $m[2];
                $z[6] += $a[1] - $m[2];
                $z[4]++;
                if ($m[0] <= 0)
                {
                    $m[0] = 0;
                    break;
                }
                $a[0] -= $m[1] - $a[2];
                $z[7] += $m[1] - $a[2];
                $z[5]++;
                if ($a[0] <= 0)
                {
                    $z[1]++;
                    break;
                }
            }
            if (!$m[0])
            {
                $z[0] = 'Fighters';
                break;
            }
        }

        if (!$z[0])
            $z[0] = 'Master';
        $z[2] = count($f) - (int)$z[1];
        $z[3] = $m[0];
        if (!$z[4])
            $z[6] = '0.00';
        else
            $z[6] = number_format((float)$z[6]/$z[4], 2, '.', '');
        if (!$z[5])
            $z[7] = '0.00';
        else
            $z[7] = number_format((float)$z[7]/$z[5], 2, '.', '');
        foreach ($z as &$s)
            $s = (string)$s;

        //var_dump($z);

        $finalStatistic = [
            "Winner " => "$z[0]",
            "Fighters Defeated" => "$z[1]",
            "Fighters Remaining" => "$z[2]",
            "Master Health" => "$z[3]",
            "Hits By Fighters" => "$z[4]",
            "Hits By Master" => "$z[5]",
            "Avg Damage Dealt By Fighters" => "$z[6]",
            "Avg Damage Dealt By Master" => "$z[7]",
        ];


        foreach ($finalStatistic as $atr => $value){
            echo '
                <table border="1" class="select">'.'
                    <tr>
                        <td style="width: 12em; text-align: center" >'."
                            $atr
                        </td>".'
                        <td style="width: 4em; text-align: center" >
                            '."$value
                        </td>
                    </tr>
                </table>";
        }


    }
    if(!empty($_POST)) {
        $fighters = [$_POST['fighter_1'], $_POST['fighter_2'], $_POST['fighter_3']];
        $master_atributes = [14, 6, 4];
        masterVsFighters($fighters, $master_atributes);


    }
    ?>

</body>
</html>