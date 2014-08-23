<?php
include_once 'includes/bootstrap.php';
include_once 'includes/classes/Article.php';

$article = new Article;

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$query = $pdo->prepare('SELECT * FROM articles WHERE article_id = ?');

	$query->execute(array(
		$id
	));

	$data = $query->fetch(PDO::FETCH_OBJ);

	$title = $data->article_title;
	$content = $data->article_content;
	$timestamp = date('l \t\h\e jS', $data->article_timestamp);
	$is_last_article = $article->is_last_article($id);

	include 'templates/article.php';
} else {
	echo 'You haven`t provided an article ID!';
}
?>