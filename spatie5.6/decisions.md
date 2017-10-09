### OpenLSS::Array2XML

This is almost identical to the other spatie library. The only difference was ArrayToXml:226, where the official library
was using the php7 null coalescing operator.

I've copied the class from the library to see how much work it is, to fork the library and update it. It was just this
singular line as far as i can tell (only quickly scanned through to get it working). 

Obviously this is a simple way to do it, but it does mean forking a library, which I'd prefer not to do. It would be useful
 to get some other devs thoughts on this, as it may be fairly standard practice here (still a newby). 

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