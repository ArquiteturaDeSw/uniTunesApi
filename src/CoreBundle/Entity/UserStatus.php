<?php

namespace CoreBundle\Entity;

abstract class UserStatus
{
    const PendingApproval = 1;
    const Active = 2;
    const Blocked = 3;
    const Deactivated = 4;
}

?>