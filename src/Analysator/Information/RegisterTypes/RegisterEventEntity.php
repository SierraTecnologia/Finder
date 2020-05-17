<?php
/**
 * Algo que aconteceu, um evento, uma ação
 */

namespace Finder\Analysator\RegisterTypes;


class RegisterEventEntity extends AbstractRegisterType
{
    public static $name = 'Event';
    public static $examples = [
        'event',
        'post',
        'calendar',
        'payment', 'pagamento', 'transferencia', 'transfer',



        'issue'
    ];


}
