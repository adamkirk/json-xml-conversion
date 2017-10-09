### JMS Serializer

As you can see from the input and given output, this library doesn't appear to give the XML I would have expected. The 
keys in the JSON are essentially ignored.

It is possible, that this library is extensible (or possibly configurable) to allow for the expected output. I haven't 
found any options suggesting this is possible though. :(

I wouldn't recommend using this library due to the less than ideal output generated.

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
<result>
  <entry>
    <entry>
      <entry><![CDATA[articles]]></entry>
      <entry><![CDATA[1]]></entry>
      <entry>
        <entry><![CDATA[JSON API paints my bikeshed!]]></entry>
        <entry><![CDATA[The shortest article. Ever.]]></entry>
        <entry><![CDATA[2015-05-22T14:56:29.000Z]]></entry>
        <entry><![CDATA[2015-05-22T14:56:28.000Z]]></entry>
      </entry>
      <entry>
        <entry>
          <entry>
            <entry><![CDATA[42]]></entry>
            <entry><![CDATA[people]]></entry>
          </entry>
        </entry>
      </entry>
    </entry>
  </entry>
  <entry>
    <entry>
      <entry><![CDATA[people]]></entry>
      <entry><![CDATA[42]]></entry>
      <entry>
        <entry><![CDATA[John]]></entry>
        <entry>80</entry>
        <entry><![CDATA[male]]></entry>
      </entry>
    </entry>
  </entry>
</result>
```