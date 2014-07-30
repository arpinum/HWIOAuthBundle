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

use HWI\Bundle\OAuthBundle\Security\Core\Authentication\Token\OAuthToken;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * SoundcloudResourceOwner
 *
 * @author Anthony AHMED <antho.ahmed@gmail.com>
 */
class SoundcloudResourceOwner extends GenericOAuth2ResourceOwner
{
	/**
     * {@inheritDoc}
     */
    protected $paths = array(
    	'identifier' => 'id',
        'nickname'   => 'username',
        'realname'   => 'full_name',
    );

    /**
     * {@inheritDoc}
     */
    protected function configureOptions(OptionsResolverInterface $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'access_token_url'         => 'https://api.soundcloud.com/oauth2/token',
            'authorization_url'        => 'https://soundcloud.com/connect',
            'infos_url'                => 'https://api.soundcloud.com/me.json',

            'use_bearer_authorization' => true,
            'scope'                    => 'non-expiring',
        ));
    }
}
