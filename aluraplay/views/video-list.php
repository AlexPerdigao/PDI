<?php

use Alura\Mvc\Entity\Video;

require_once __DIR__ . '/inicio-html.php';
/** @var Video[] $videoList */
?>
    <ul class="videos__container">
        <?php foreach ($videoList as $video): ?>
            <li class="videos__item">
                <?php if ($video->getFilePath() !== null): ?>
                    <a href="<?php echo $video->url; ?>">
                        <img src="/img/uploads/<?= $video->getFilePath(); ?>" alt="" style="width: 100%"/>
                    </a>
                <?php else: ?>
                    <iframe width="100%" height="72%" src="<?php echo $video->url; ?>"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                <?php endif; ?>
                <div class="descricao-video">
                    <img src="/public/img/logo.png" alt="logo canal alura">
                    <h3><?php echo $video->title; ?></h3>
                    <div class="acoes-video">
                        <a href="/alterar-video?id=<?= $video->id; ?>">Editar</a>
                        <a href="/remover-video?id=<?= $video->id; ?>">Excluir</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

<?php require_once __DIR__ . '/fim-html.php';

