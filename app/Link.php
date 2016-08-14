<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'PLD_LINK';

    public function getDetailsUrl()
    {
        $linkTitle = $this->getOptimisedLinkTitle();
        $detailsUrl = sprintf('/%s-link-%s.html', $linkTitle, $this->ID);
        return $detailsUrl;
    }

    public function getOptimisedLinkTitle()
    {
        $linkTitle = $this->TITLE;
        $linkTitle = str_replace(' ', '-', $linkTitle);
        $linkTitle = str_replace(',', '', $linkTitle);
        $linkTitle = str_replace('---', '-', $linkTitle);
        $linkTitle = strtolower($linkTitle);
        return $linkTitle;
    }
}
