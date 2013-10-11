<?php

class OffersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('offers')->truncate();

		$offers = array(
			array(
				'title' => 'Conference PHP Frameworks Day 2013 in Kiev',
				'description' => 'October 24 in the city center will be the most extensive PHP Event CIS - PHP Frameworks Day. Among the frameworks: Yii 2, Zend Framework 2, Symfony 2, Phalcon, Silex, Codeception, Bluz different frameworks for testing.',
				'city_id' => 1,
				'company_id' => 1,
				'off' => 65,
				'image' => '/images/2013/10/11/Wtob69QJvn75o7eJtmkYRSwb3EhZrd.jpg',
				'expires' => date('Y-m-d', strtotime('+1 week')),
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'title' => '404 Festival',
				'description' => 'The festival will be at the Holiday Inn Moscow. If you are not from Samara, the participation in the conference, other than the conference itself - a great opportunity to see our beautiful city. Autumn here is particularly beautiful and pleasant to walk through the streets. Prepati, the two day conference and a powerful after-party - the perfect pastime for people from the Internet.',
				'city_id' => 2,
				'company_id' => 1,
				'off' => 75,
				'image' => '/images/2013/10/11/naZlACr97FW6U3lU961XKCMS1OjL8W.jpg',
				'expires' => date('Y-m-d', strtotime('+1 week 3 days')),
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'title' => 'Training on "Designing Interfaces"',
				'description' => "During the training you will pass the full cycle of work associated with the design of the interface of the product from the job to build a prototype .\r\n\r\n
								Participants will become familiar with modern techniques for the analysis and design of interfaces: the technique of working with the client requirements (Design Thinking), the conversion of user customer (Customer Journey), custom scripts (Usage Scenarios), describe the technology users (Personas).\r\n\r\n
								By the end of the training you will understand the methodology of designing UI, on which in the future will be able to design almost any interface .\r\n\r\n
								Training participants will receive handouts and a certificate of completion of the training school .\r\n\r\n
								See the training program on the page : school.system-analysis.ru/trainings/user-interface-design/",
				'city_id' => 1,
				'company_id' => 1,
				'off' => 25,
				'image' => '/images/2013/10/11/GVhofCywYJk9RBG2Bu3ScGIo792bUx.jpg',
				'expires' => date('Y-m-d', strtotime('+1 week 6 days')),
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'title' => '.toster {javascript}',
				'description' => "Talk topic №1\r\n
								Building Massive Applications in NodeJS\r\n
								Jan Jongboom\r\n\r\n
								Talk topic №2\r\n
								Excessive Enhancement: JavaScript's dark side\r\n
								Phil Hawksworth\r\n\r\n
								Talk topic №3\r\n
								AmplifyJS\r\n
								Ralph Whitbeck\r\n\r\n
								Talk topic №4\r\n
								Measure and monitoring of the site client-side with 150M users\r\n
								Pavel Dovbush\r\n\r\n
								Talk topic №5\r\n
								JavaScript APIs - The Web is the Platform\r\n
								Robert Nyman\r\n\r\n
								Talk topic №6\r\n
								Experience creating JS-application\r\n
								Shavkat Aynurin\r\n\r\n
								Talk topic №7\r\n
								Alice.js/BBUI.js\r\n
								Adam Stanley\r\n\r\n
								Talk topic №8\r\n
								Creating HTML/JS applications for Windows 8\r\n
								Konstantin Kichinsky\r\n\r\n
								Talk topic №9\r\n
								To be future friendly is to be device agnostic\r\n
								Joe McCann",
				'city_id' => 2,
				'company_id' => 2,
				'off' => 85,
				'image' => '/images/2013/10/11/z9H39n8cVsKGQyel8Hjc5jaXwuQBkO.jpg',
				'expires' => date('Y-m-d', strtotime('+2 week 3 days')),
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'title' => '. toaster {ruby}',
				'description' => "Talk topic № 1\r\n
								Deciphering Rails 3\r\n
								Gregg Pollack\r\n\r\n
								Talk topic № 2\r\n
								Understanding the Rails web model and scalability options\r\n
								Fabio Akita\r\n\r\n
								Talk topic № 3\r\n
								As we did Groupon\r\n
								Ivan Evtuhovich\r\n\r\n
								Talk topic № 4\r\n
								Why JRuby?\r\n
								Douglas Campos\r\n\r\n
								Talk topic № 5\r\n
								Sinatra: Past, Present and Future\r\n
								Konstantin Haase\r\n\r\n
								Talk topic № 6\r\n
								Travis CI. Splitting your app into smaller pieces\r\n
								Joshua Kalderimis\r\n\r\n
								Talk topic № 7\r\n
								The practice of JRuby\r\n
								Timofey Klimenko\r\n\r\n
								Talk topic № 8\r\n
								Attributes Unwrapped: Lessons under the surface of active record\r\n
								Jonathan Leighton",
				'city_id' => 1,
				'company_id' => 2,
				'off' => 50,
				'image' => '/images/2013/10/11/kwu908LMCfqkZlCmsRfyKOzlPfuQ6o.jpg',
				'expires' => date('Y-m-d', strtotime('+2 week 6 days')),
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'title' => '. toster {web-development}',
				'description' => "Talk topic №1\r\n
								Opening remarks\r\n
								Angela Zäh\r\n\r\n
								Talk topic №2\r\n
								New on Facebook: custom open graph, profile and other distribution channels\r\n
								Angela Zäh\r\n\r\n
								Talk topic №3\r\n
								Platform features - streaming\r\n
								Scott Chacon\r\n\r\n
								Talk topic №4\r\n
								Reusable Code, for good or for awesome!\r\n
								Jake Archibald\r\n\r\n
								Talk topic №5\r\n
								Introduction to NodeJS\r\n
								Matthew Eernisse\r\n\r\n
								Talk topic №6\r\n
								Wild Wild Web. HTML5\r\n
								Konstantin Kichinsky\r\n\r\n
								Talk topic №7\r\n
								Intern architecture and devices of 'Odnoklassniki' social network\r\n
								Andrew Guba\r\n\r\n
								Talk topic №8\r\n
								Fast development of web-applications using WebMatrix\r\n
								Vladimir Yunev\r\n\r\n
								Talk topic №9\r\n
								Development for Facebook: Games and Open Graph\r\n
								Gareth Morris",
				'city_id' => 2,
				'company_id' => 2,
				'off' => 30,
				'image' => '/images/2013/10/11/essRhlDuvHvMKiY5j3K3eOGT45odti.jpg',
				'expires' => date('Y-m-d', strtotime('+3 weeks')),
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
		);

		// Uncomment the below to run the seeder
		DB::table('offers')->insert($offers);
	}

}
