<?php
#TESTE PRÁTICO EM PHP - CANDIDATO: VITOR CIOLETTI MORAIS
  use vendor\guzzlehttp\guzzle\src\Client;
  use Symfony\Component\DomCrawler\Crawler;
  require 'vendor/autoload.php';
  #GET o Html da página
  $client = new GuzzleHttp\Client();
  $request = $client->get('https://news.ycombinator.com/');
  $crawler = new Crawler((string)$request->getBody());
  #Filtra e retorna todos os títulos dos posts da página
  $news = $crawler->filter('body > center > table > tr .athing')->each(function(Crawler $node){
      return $node->filter('td:nth-child(3) > a');
  });
  #Alterar o valor do for para retornar mais do que 3 títulos
  for ($i=0; $i < 3; $i++){  echo $i +1 . " - ". $news[$i]->text() . " ";}
?>
