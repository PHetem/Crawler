# Crawler

## Description #

URL crawler API
Useful for data mining applications, among others

## Setup ##

To use:

- Send a post request to route "public/" containing a body in the following structure:
```json
{
    "Pages": [
        {
            "Url": "URL to scan",
            "Selector": "HTML tags that should be included, following the JQuery selector format",
            "SelectorRemove": "HTML tags that should be removed from the result",
            "SelectorRecursive": "HTML tags of links that should be followed and added to the result"
        },
        {
            "Url": "Other URL to scan",
            "Selector": "HTML tags that should be included, following the JQuery selector format",
            "SelectorRemove": "HTML tags that should be removed from the result",
            "SelectorRecursive": "HTML tags of links that should be followed and added to the result"
        }
    ]
}
```

- Files containing the retrieved content will be created on the folder public/result
