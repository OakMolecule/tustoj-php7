#!/bin/bash
# After core is successfully compiled
sudo cp judged.service /lib/systemd/system/judged.service
sudo ln -s /lib/systemd/system/judged.service /etc/systemd/system/multi-user.target.wants/
sudo systemctl enable judged.service
sudo systemctl daemon-reload
sudo systemctl start judged.service