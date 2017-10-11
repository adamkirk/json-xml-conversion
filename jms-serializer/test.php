<?php

require "./vendor/autoload.php";

use Doctrine\Common\Annotations\AnnotationRegistry;
use \JMS\Serializer\Annotation\XmlKeyValuePairs;

AnnotationRegistry::registerFile(__DIR__ . "/vendor/jms/serializer/src/JMS/Serializer/Annotation/XmlKeyValuePairs.php");


$json = '{
  "data": [{
    "type": "articles",
    "id": "1",
    "attributes": {
      "title": "JSON API paints my bikeshed!",
      "body": "The shortest article. Ever.",
      "created": "2015-05-22T14:56:29.000Z",
      "updated": "2015-05-22T14:56:28.000Z"
    },
    "relationships": {
      "author": {
        "data": {"id": "42", "type": "people"}
      }
    }
  }],
  "included": [
    {
      "type": "people",
      "id": "42",
      "attributes": {
        "name": "John",
        "age": 80,
        "gender": "male"
      }
    }
  ]
}';

class TestData {
    /**
     * @var array
     * @XmlKeyValuePairs
     */
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

}

$data = json_decode($json, true);


$dto = new TestData($data);

$serializer = JMS\Serializer\SerializerBuilder::create()->build();



var_dump($data);
var_dump($serializer->serialize($dto, 'xml'));