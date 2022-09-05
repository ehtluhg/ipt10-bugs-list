<!doctype html>
<html lang="en">
    <?php
    include "vendor/autoload.php";
    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\Request;
    define('TOKEN', '[MGnt7X0n96lKFbf3ORHp0NzKh50TWUyd]');
    define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');
    

    $client = new Client();
    $headers = [
        'Authorization' => 'MGnt7X0n96lKFbf3ORHp0NzKh50TWUyd'
    ];
    $request = new Request('GET', 'https://ipt10-2022.mantishub.io/api/rest/issues?page_size=10&page=1', $headers);
    $res = $client->sendAsync($request)->wait();
    $bugs = $res->getBody()->getContents();
    $bugs_list = json_decode($bugs);

    ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IPT10 Bugs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <h1>IPT10 Bugs List</h1>
    <p class="text-primary fs-3"><u>Gabriel Rhobert P. Dy</u></p>
    <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Summary</th>
      <th scope="col">Severity</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
     <?php
        foreach ($bugs_list->issues as $bug)
        {   
        echo '<tr>'. '<th scope="row">' . $bug->id . '</th>' . '<td>' .
        $bug->summary . '</td>' . '<td>' .
        $bug->severity->name . '</td>' . '<td>' .
        $bug->status->name . '</td>' . '</tr>';
        }
    ?>
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>