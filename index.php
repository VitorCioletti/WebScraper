<?php
  use vendor\guzzlehttp\guzzle\src\Client;
  use Symfony\Component\DomCrawler\Crawler;
  require 'vendor/autoload.php';
  #GET page html
  $client = new GuzzleHttp\Client();
  $request = $client->get('https://news.ycombinator.com/');
  $crawler = new Crawler((string)$request->getBody());
  #Filter and return every <a> that fits the filtering
  $news = $crawler->filter('body > center > table > tr .athing')->each(function(Crawler $node){
      return $node->filter('td:nth-child(3) > a');
  });
  #Alter this value to print more titles 
  for ($i=0; $i < 3; $i++){  echo $i +1 . " - ". $news[$i]->text() . " ";}
?>
