[![Build Status](https://travis-ci.org/httpoz/coverage.svg)](https://travis-ci.org/httpoz/coverage)
[![codecov](https://codecov.io/gh/httpoz/coverage/branch/master/graph/badge.svg)](https://codecov.io/gh/httpoz/coverage)

```curl
curl -X POST \
  http://your_applications_url/hooks/{hook-id}/metric \
  -F 'report=@your_apps_file_path\build\logs\clover.xml'
```