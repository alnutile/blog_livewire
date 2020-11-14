<?php

namespace App\Traits;

use Facades\League\CommonMark\CommonMarkConverter;

trait MarkdownToHtml
{

  public function transform($markdown): string
  {
    return CommonMarkConverter::convertToHtml($markdown);
  }
}
