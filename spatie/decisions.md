### Spatie::ArrayToXml

This library is simple to use, just one class to convert an array to XML. The output from this library is what I 
would expect out of a conversion from JSON to XML.

The API for this is the most obvious, as you can just 'convert' an array to XML.

This would be the best candidate I think, if it wasn't for the fact we are using php5.6. This library isn't compatible 
so we would have to fork, or potentially submit a pull request to update it.  

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
<?xml version="1.0" encoding="UTF-8"?>
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