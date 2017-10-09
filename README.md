## JSON -> XML

### KPI’S for JSON -> XML library

- Small: its quite a simple task, so a small and simple library makes sense. (KISS)
- Recursive: it should convert an array of any depth to XML nodes
- Fault tolerance: I would expect this library to hide any 500 errors etc and throw a more useful exception. Any exceptions thrown should be well described, i.e not one catch all

### Potential Libraries

- https://packagist.org/packages/openlss/lib-array2xml
- https://packagist.org/packages/spatie/array-to-xml
- https://jmsyst.com/bundles/JMSSerializerBundle

See each sub directory to see how they work, and what the pros/cons are for each.

### Approaches

- The magical fetcher: The fetcher, upon retrieving the feed, will check the format and convert appropriately. If its JSON, will convert to XML, if not will return the result normally.
- The magical transformer: The transformer->transform() method, will check the format and run the result through a JSON transformer when appropriate.
- Configuration flag: Add a new flag to each feed (default to false for compatibility), of ‘is_json’. When this flag is true, the transformer factory, will always return a ‘chained_transformer’ and prepend a JSON->XML transformer, to the list of transformers (or create a collection of transformers if only one was present)
- New Transformer: Add a new JSON->XML transformer. Then simply change any feeds using JSON to a ‘chained_transformer’, and add the JSON->XML transformer as the first transformer in the chain
- Response Normaliser: Add a new step in the flow, which ‘normalises’ responses. The normaliser would take a raw response and return it in the expected XML format (would do nothing if it is already XML)

### Benefits:

- Magical Fetcher:
    - No specific configuration required, will be detected at process time
    - Cognitive overhead should be kept to a minimum
- Magical transformer:
    - Same as magical fetcher
    - This has the benefit, that this does seem an appropriate place to transform the result
- Configuration flag:
    - Very explicit, we know that this feed is going to return JSON
    - Little effort to add a JSON feed
- New transformer:
    - Very simple, requires 0 modification to current flow
    - Quite explicit, in that we can see the feed is being run through this transformer
- Response Normaliser:
    - Not intrusive to any of the existing functionality
    - Could be easily extended to handle formats other than JSON/XML
    - Small cognitive overhead
    - No configuration changes required
    - Would make it very simple to add new JSON feeds, i.e. would only have to add .xsl file for normal flow

### Drawbacks:

- Magical fetcher:
    - It wouldn’t be obvious that a transformation is happening in the fetcher
    - Requires more tolerance/validation in the fetcher itself
    - Cannot tell from the code, whether a feed is JSON or XML initially, would need to check manually
- Magical Transformer:
    - Same as above, except this does seem an appropriate place for the transformation to happen
    - Abstraction, to achieve this without hindering maintainability, I suspect a new Abstract transformer object would be required. This object would have to handle the checking of the given value for format type. This may add some cognitive overhead
- Configuration flag:
    - Requires dev work to change
    - Overriding the transformers at runtime, would cause potential confusion and headaches (particularly while debugging)
- New transformer
    - Little safety or type checking, by default (it could be added), it would make the configuration more fragile (i.e. missing this loader, would break the feed)
    - Ordering must be thought about when adding a new JSON feed
- Response Normaliser:
    - May add slight overhead to process, if every feed goes through this (very minimal as it will not do any processing if the format is already XML)
    - Add new dependency to the Fetcher (potentially, depends on exact implementation details)