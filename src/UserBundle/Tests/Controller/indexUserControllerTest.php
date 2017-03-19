<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class indexUserControllerTest extends WebTestCase
{
	private $cat = array();
	private $subcat = array();
	private $links_subcat = array();

    public function testIndex()
    {
    	global $links_subcat;// = array();
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertGreaterThan(0, $crawler->filter('div h4')->count());


        $link = $crawler
		    ->filter('div.card a.a-card') // find all links with the text "Greet"
		    //->eq(0) // select the second link in the list
		    ->links()
		;

		foreach ($link as $key => $value) {
			$this->subcat[] = $key + 1;
			//print(" value= " . $value);
			// and click it
			if($key == 0 or $key == 1){
				$text_link = $crawler
				    ->filter('div.card a.a-card') // find all links with the text "Greet"
				    ->eq($key) // select the second link in the list
				    ->attr("href")
				    //->text()
				;
				print_r(" text_link= " . $text_link);
				print_r("\n");
				$links_subcat[] = $text_link;

				$crawler1 = $client->click($value);
				
				//$this->assertContains('c dfv', $crawler->filter('div h4')->text());
				$this->assertGreaterThan(0, $crawler1->filter('div h4')->count());
			}
		}
    }

    public function testShowSubcat()
    {
    	global $links_subcat;
    	global $links_good;

    	$client = static::createClient();

    	foreach ($links_subcat as $key => $value) {
    		print_r(" links_subcat= " . $value);
			print_r("\n");

	        $url = $value;

	        $crawler = $client->request('GET', $url);

	        $this->assertEquals(200, $client->getResponse()->getStatusCode());
	        $this->assertGreaterThan(0, $crawler->filter('div h4')->count());

	        $link = $crawler
			    ->filter('div.card a.a-card') // find all links with the text "Greet"
			    //->eq(0) // select the second link in the list
			    ->links()
			;

			foreach ($link as $key => $value) {
				//$this->subcat[] = $key + 1;
				//print(" value= " . $value);
				// and click it
					$text_link = $crawler
					    ->filter('div.card a.a-card') // find all links with the text "Greet"
					    ->eq($key) // select the second link in the list
					    ->attr("href")
					    //->text()
					;
					print_r(" text_link_good= " . $text_link);
					print_r("\n");
					$links_good[] = $text_link;

					$crawler1 = $client->click($value);
					
					//$this->assertContains('c dfv', $crawler->filter('div h4')->text());
					$this->assertGreaterThan(0, $crawler1->filter('div img')->count());
			}
	    }
    }

    public function testShowGood()
    {
    	//global $links_subcat;
    	global $links_good;
    	global $links_buy;
    	
    	$client = static::createClient();

    	foreach ($links_good as $key => $value) {
    		print_r(" links_good= " . $value);
			print_r("\n");

	        $url = $value;

	        $crawler = $client->request('GET', $url);

	        $this->assertEquals(200, $client->getResponse()->getStatusCode());
	        $this->assertGreaterThan(0, $crawler->filter('div img')->count());

	        $link = $crawler
			    ->filter('div.caption a.btn-primary') // find all links with the text "Greet"
			    //->eq(0) // select the second link in the list
			    ->link()
			;

					$text_link = $crawler
					    ->filter('div.caption a.btn-primary') // find all links with the text "Greet"
					    //->eq($key) // select the second link in the list
					    ->attr("onclick")
					    //->text()
					;
					print_r(" text_link_buy= " . $text_link);
					print_r("\n");
					//print_r("______________________________________________________________________");
					$links_buy[] = $text_link;

					$crawler1 = $client->click($link);
					
					//$this->assertContains('c dfv', $crawler->filter('div h4')->text());
					//$this->assertGreaterThan(0, $crawler1->filter("form[name='bag_register']")->count());
					$this->assertGreaterThan(0, $crawler1->filter('img')->count());

					//print_r($GLOBALS);
					//print_r("\n");
					//print_r("\n");

					//$form = $crawler1->selectButton('.inp_contin')->text();//->form();
					//print_r(" text_button_contin= " . $form);
					//print_r("\n");

					//$crawler1 = $client->submit($form, array('name' => 'Fabien', 'city' => 'Fabien', 'tel' => '235316326', 'comment' => 'sDGRGDFXfhgdfb'));
					//$this->assertGreaterThan(0, $crawler1->filter('h3')->count());
			//}
	    }
    }

   /* public function testShowGood()
    {
    	$form = $crawler1->selectButton('Готово')->form();
		$crawler1 = $client->submit($form, array('name' => 'Fabien'));
    }*/
}