<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\Contact;

class ContactTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_contact_model(): void
    {
        $contact = Contact::fromArray([
            'name' => 'John Doe',
            'url' => 'http://example.com',
            'email' => 'john.doe@mail.com'
        ]);

        $this->assertEquals('John Doe', $contact->getName());
        $this->assertEquals('http://example.com', $contact->getUrl());
        $this->assertEquals('john.doe@mail.com', $contact->getEmail());
    }

    /**
     * @test
     */
    public function it_should_parse_contact_model_without_not_required_data(): void
    {
        $contact = Contact::fromArray([]);

        $this->assertNull($contact->getName());
        $this->assertNull($contact->getUrl());
        $this->assertNull($contact->getEmail());
    }
}
