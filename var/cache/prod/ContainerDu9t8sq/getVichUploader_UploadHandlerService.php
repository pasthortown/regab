<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'vich_uploader.upload_handler' shared service.

$a = ${($_ = isset($this->services['vich_uploader.storage']) ? $this->services['vich_uploader.storage'] : $this->load('getVichUploader_StorageService.php')) && false ?: '_'};

return $this->services['vich_uploader.upload_handler'] = new \Vich\UploaderBundle\Handler\UploadHandler(${($_ = isset($this->services['vich_uploader.property_mapping_factory']) ? $this->services['vich_uploader.property_mapping_factory'] : $this->load('getVichUploader_PropertyMappingFactoryService.php')) && false ?: '_'}, $a, new \Vich\UploaderBundle\Injector\FileInjector($a), ${($_ = isset($this->services['event_dispatcher']) ? $this->services['event_dispatcher'] : $this->getEventDispatcherService()) && false ?: '_'});
