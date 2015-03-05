<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware.Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HWI\Bundle\OAuthBundle\OAuth\ResourceOwner;

use Buzz\Message\RequestInterface as HttpRequestInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OpenAmResourceOwner extends GenericOAuth2ResourceOwner
{
    protected $paths = array(
        'identifier'     => 'sub',
        'nickname'       => 'sub',
        'realname'       => 'name',
        'email'          => 'email',
    );

    protected function doGetTokenRequest($url, array $parameters = array())
    {
        return $this->httpRequest($this->normalizeUrl($url, $parameters), null, array(), HttpRequestInterface::METHOD_POST);
    }

    protected function configureOptions(OptionsResolverInterface $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'authorization_url'        => 'http://openam.arpinum.fr/openam/oauth2/authorize',
            'access_token_url'         => 'http://openam.arpinum.fr/openam/oauth2/access_token',
            'infos_url'                => 'http://openam.arpinum.fr/openam/oauth2/userinfo',

            'csrf'                     => false,

            'use_bearer_authorization' => true,
        ));
    }
}
