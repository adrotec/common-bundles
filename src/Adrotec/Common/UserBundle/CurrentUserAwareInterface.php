<?php

namespace Adrotec\Common\UserBundle;

use Adrotec\Common\UserBundle\Entity\User;

interface CurrentUserAwareInterface
{
    public function setUser(User $user);
}
