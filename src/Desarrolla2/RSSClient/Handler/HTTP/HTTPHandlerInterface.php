<?php

/**
 * This file is part of the RSSClient proyect.
 *
 * Copyright (c)
 * Daniel González <daniel.gonzalez@freelancemadrid.es>
 *
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 */

namespace Desarrolla2\RSSClient\Handler\HTTP;

/**
 *
 * Description of HTTPClientInterface
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es>
 */
interface HTTPHandlerInterface
{
    /**
     * Retrieve a resource in plain text from a url
     *
     * @param  string $resource
     * @return string
     */
    public function get($resource);
}
