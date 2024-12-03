<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Helper\FlashMessageTrait;
use Alura\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EditVideoController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $requestBody = $request->getParsedBody();
        $id = filter_var($requestBody['id'], FILTER_VALIDATE_INT );
        if ($id === FALSE || $id === null) {
            $this->addErrorMessage('ID inválido');
            return new Response(302, ['Location' => '/']);
        }

        $url = filter_var($requestBody['url'], FILTER_VALIDATE_URL );
        if ($url === false) {
            $this->addErrorMessage('URL inválida');
            return new Response(302, ['Location' => '/']);
        }
        $titulo = filter_var($requestBody['title']);
        if ($titulo === false) {
            $this->addErrorMessage('Título inválido');
            return new Response(302, ['Location' => '/']);
        }

        $video = new Video($titulo, $url);
        $files = $request->getUploadedFiles();
        /** @var UploadedFileInterface $uploadedImage */
        $uploadedImage = $files['image'];

        if ($uploadedImage->getError() === UPLOAD_ERR_OK) {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $tmpFile = $uploadedImage->getStream()->getMetadata('uri');
            $mimeType = $finfo->file($tmpFile);

            if (str_starts_with($mimeType, 'image/')) {
                $safeFileName = uniqid('upload_') . '-' . pathinfo($uploadedImage->getClientFilename(), PATHINFO_FILENAME);
                $uploadedImage->moveTo(__DIR__ . '/../../public/img/uploads/' . $safeFileName);
                $video->setFilePath($_FILES['image']['name']);
            }
        }

        $success = $this->videoRepository->update($video);
        if ($success === true) {
            return new Response(302, ['Location' => '/']);
        } else {
            $this->addErrorMessage('Erro ao editar o vídeo');
            return new Response(302, ['Location' => '/']);
        }

    }
}