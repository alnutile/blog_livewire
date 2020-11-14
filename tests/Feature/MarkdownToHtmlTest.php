<?php

namespace Tests\Feature;

use App\Traits\MarkdownToHtml;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarkdownToHtmlTest extends TestCase
{
    use MarkdownToHtml;

    public function testConversion()
    {
        $results = $this->transform("# Foo");
        $this->assertEquals("<h1>Foo</h1>\n", $results);
    }
}
