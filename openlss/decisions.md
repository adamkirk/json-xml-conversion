### OpenLSS::Array2XML

This library is simple to use, just two classes: xml -> array and array -> xml. The output from this library is what I 
would expect out of a conversion from JSON to XML.

One of the main downsides to this is that the API for the objects isn't immediately obvious (calling 'saveXML' to get 
the XML isn't what I'd expect that method to do).

Overall I think this is the best candidate from the suggestions in this repo. 

#### Input

```json
{
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
}
```

#### Output

```xml
<root>
  <data>
    <type>articles</type>
    <id>1</id>
    <attributes>
      <title>JSON API paints my bikeshed!</title>
      <body>The shortest article. Ever.</body>
      <created>2015-05-22T14:56:29.000Z</created>
      <updated>2015-05-22T14:56:28.000Z</updated>
    </attributes>
    <relationships>
      <author>
        <data>
          <id>42</id>
          <type>people</type>
        </data>
      </author>
    </relationships>
  </data>
  <included>
    <type>people</type>
    <id>42</id>
    <attributes>
      <name>John</name>
      <age>80</age>
      <gender>male</gender>
    </attributes>
  </included>
</root>
```