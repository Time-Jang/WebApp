<!DOCTYPE html>
<html>

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $song_count = 5678; ?>
		<p>
			I love music.
			I have <?= print $song_count; ?>total songs,
			which is over <?= print (int)($song_count/10); ?>hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Yahoo! Top Music News</h2>

			<ol>
				<?php $news_pages = $_GET["newspages"];
							if(isset($news_pages) == 0)
							{
								$news_pages = 5;
							}
							for($current_page = 1; $current_page != $news_pages+1; $current_page++)
							{
									print "<li><a href=\"http://music.yahoo.com/news/archive/?page=$current_page\">Page $current_page</a></li>";
							}?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
				$favorite_artists_names = file("favorite.txt");
				for($i = 0; $i < count($favorite_artists_names); $i++)
				{
					print "<li><a href=\"http://en.wikipedia.org/wiki/$favorite_artists_names[$i]\">$favorite_artists_names[$i]</a></li>";
				}
				?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				function cmp_size($a, $b)
				{
					if((int)(filesize($a)/1024) < (int)(filesize($b)/1024))
						return 1;
					return 0;
				}
				$array_mp3_playlist = glob("lab5/musicPHP/songs/*.mp3");
				usort($array_mp3_playlist, "cmp_size");
				foreach ($array_mp3_playlist as $mp3_playlist)
				{
					print "<li class\"mp3item\">";
					print	"	<a href=$mp3_playlist>" . basename($mp3_playlist) . " (" . (int)(filesize($mp3_playlist)/1024) . " KB)</a>";
					print "</li>";
				}
				?>
				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$array_m3u_file = glob("lab5/musicPHP/songs/*.m3u");
				rsort($array_m3u_file);
				foreach ($array_m3u_file as $m3u_file)
				{
					$array_content_file = file($m3u_file);
					shuffle($array_content_file);
					print "<li class=\"playlistitem\">" . basename($m3u_file) . ":";
					print "	<ul>";
					foreach ($array_content_file as $content_file)
						if(strpos($content_file, '#') !== 0)
							print "<li>" . $content_file ."</li>";
					print " </ul>";
					print "</li>";
				}
				?>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
