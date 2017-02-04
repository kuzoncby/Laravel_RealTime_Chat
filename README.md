# Laravel Real-Time Chat
Real-Time chat implements by laravel 5.4 + redis

# Note
This project under construction.

If your laradock have problem with selinux, try this:
```bash
semanage fcontext -a -t container_file_t "/full/path/of/your/Laravel_RealTime_Chat(/.*)?"
restorecon -Rv /full/path/of/your/Laravel_RealTime_Chat
ls -alZ
```
make sure **_container_file_t_** show up.