[![Build Status](https://travis-ci.org/httpoz/coverage.svg)](https://travis-ci.org/httpoz/coverage)
[![codecov](https://codecov.io/gh/httpoz/coverage/branch/master/graph/badge.svg)](https://codecov.io/gh/httpoz/coverage)

```curl
curl -X POST \
  http://coverage.wip/hooks/{hook-id}/metric \
  -F 'report=@C:\Users\oscarm\code\coverage\build\logs\clover.xml'
```