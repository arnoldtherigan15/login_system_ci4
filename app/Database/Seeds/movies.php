<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Movies extends Seeder
{
	public function run()
	{
		$movies = [
			[
				'title' => 'Dunkirk',
				'genre'  => 'action',
				'year' => 2017,
				'rating' => 4,
				'poster' => 'dunkirk.jpg',
				'description' => 'May/June 1940. Four hundred thousand British and French soldiers are hole up in the French port town of Dunkirk. The only way out is via sea, and the Germans have air superiority, bombing the British soldiers and ships without much opposition. The situation looks dire and, in desperation, Britain sends civilian boats in addition to its hard-pressed Navy to try to evacuate the beleaguered forces. This is that story, seen through the eyes of a soldier amongst those trapped forces, two Royal Air Force fighter pilots, and a group of civilians on their boat, part of the evacuation fleet.',
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			],
			[
				'title' => 'The Greatest Showman',
				'genre'  => 'drama',
				'year' => 2017,
				'rating' => 5,
				'poster' => 'showman.jpg',
				'description' => "Orphaned, penniless but ambitious and with a mind crammed with imagination and fresh ideas, the American Phineas Taylor Barnum will always be remembered as the man with the gift to effortlessly blur the line between reality and fiction. Thirsty for innovation and hungry for success, the son of a tailor will manage to open a wax museum but will soon shift focus to the unique and peculiar, introducing extraordinary, never-seen-before live acts on the circus stage. Some will call Barnum's wide collection of oddities, a freak show; however, when the obsessed showman gambles everything on the opera singer Jenny Lind to appeal to a high-brow audience, he will somehow lose sight of the most important aspect of his life: his family. Will Barnum risk it all to be accepted?",
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			],
			[
				'title' => 'Alita',
				'genre'  => 'action',
				'year' => 2019,
				'rating' => 3,
				'poster' => 'alita.jpg',
				'description' => "Alita is a creation from an age of despair. Found by the mysterious Dr. Ido while trolling for cyborg parts, Alita becomes a lethal, dangerous being. She cannot remember who she is, or where she came from. But to Dr. Ido, the truth is all too clear. She is the one being who can break the cycle of death and destruction left behind from Tiphares. But to accomplish her true purpose, she must fight and kill. And that is where Alita's true significance comes to bear. She is an angel from heaven. She is an angel of death. ",
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			],
			[
				'title' => 'Black Panther',
				'genre'  => 'action',
				'year' => 2018,
				'rating' => 5,
				'poster' => 'blackpanther.jpg',
				'description' => "T'Challa, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his country's past.",
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			]
		];

		foreach ($movies as $data) {
			// insert semua data ke tabel
			$this->db->table('movies')->insert($data);
		}
	}
}
