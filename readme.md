[![Build Status](https://travis-ci.org/httpoz/coverage.svg)](https://travis-ci.org/httpoz/coverage)
[![codecov](https://codecov.io/gh/httpoz/coverage/branch/master/graph/badge.svg)](https://codecov.io/gh/httpoz/coverage)

```bash
ogdir=$(pwd) 
&& commit=$(git rev-parse --short HEAD)
&& cd build/logs 
&& curl -X POST path_to_your_application/hooks/{your_secret_webhook_id}/metric -F commit=${commit} -F 'report=@clover.xml' 
&& cd $ogdir
```