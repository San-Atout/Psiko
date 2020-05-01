<?php
//Modifié par Come
$userId = $params["id"];

if (!isset($_SESSION["auth"]))
{
    header("Location: /fr/connexion/");
    exit();
}
if (($_SESSION["auth"]->getRang() != "administrateur" && $_SESSION["auth"]->getRang() != "gestionnaire" ) || ($_SESSION["auth"]->getId() != $userId)) {
    header("Location: /fr/401");
    exit();
}
$data1 = '';
$data2 = '';
$data3 = '';
$data4 = '';
$data5 = '';
$data6 = '';


//query to get data from the table
$sql = "SELECT freqCardiaque, temperature,memorisation,reflexe,tonalite,dateExamen FROM `resultat_examen` ";
$result = mysqli_query($mysqli, $sql);

//loop through the returned data
while ($row = mysqli_fetch_array($result)) {

    $data1 = $data1 . '"'. $row['freqCardiaque'].'",';
    $data2 = $data2 . '"'. $row['temperature'] .'",';
    $data3 = $data3 . '"'. $row['memorisation'] .'",';
    $data4 = $data4 . '"'. $row['reflexe'] .'",';
    $data5 = $data5 . '"'. $row['tonalite'] .'",';
    $data6 = $data6 . '"'. $row['dateExamen'] .'",';

}

$data1 = trim($data1,",");
$data2 = trim($data2,",");
$data3 = trim($data3,",");
$data4 = trim($data4,",");
$data5 = trim($data5,",");
$data6 = trim($data6,",");

if ($_SESSION["auth"]->getRang() != "administrateur" && $_SESSION["auth"]->getRang() != "gestionnaire" )
{

}
else
{

    if (!empty($_POST)) {
        $userSystem = new \Psiko\UserSystem();
        $r = $userSystem->recherche($_POST, "fr", 1);
        var_dump($r);
    }


}
?>


<script type="text/javascript" src="/JS/charte.bundle.js"></script>
    <h1>Résultats graphique des tests de mesure psycotechnique</h1>
    <canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;border-radius:20px;"></canvas>

    <script>
        var ctx = document.getElementById("chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {


                labels: [<?php echo $data6; ?>],

                datasets:
                    [{
                        label: 'Fréquence Cardiaque ',
                        data: [<?php echo $data1; ?>],
                        backgroundColor: 'transparent',
                        borderColor:'rgba(255,99,132)',
                        borderWidth: 3
                    },

                        {
                            label: 'Température de la peau',
                            data: [<?php echo $data2; ?>],
                            backgroundColor: 'transparent',
                            borderColor:'rgba(255,204,153)',
                            borderWidth: 3
                        },
                        {
                            label: 'Mémorisation d\'une teinte colorée ',
                            data: [<?php echo $data3; ?>],
                            backgroundColor: 'transparent',
                            borderColor:'rgba(0,255,255)',
                            borderWidth: 3
                        },
                        {
                            label: 'Réflexes visuels',
                            data: [<?php echo $data4; ?>],
                            backgroundColor: 'transparent',
                            borderColor:'rgba(153, 255, 102)',
                            borderWidth: 3
                        },
                        {
                            label: 'Tonalité',
                            data: [<?php echo $data5; ?>],
                            backgroundColor: 'transparent',
                            borderColor:'rgba(128, 128, 0)',
                            borderWidth: 3
                        },
                    ]
            },

            options: {
                scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                tooltips:{mode: 'index'},
                legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
            }
        });
    </script>
