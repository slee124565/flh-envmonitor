# sudo -u pi epiphany-browser -a --profile ~/.config http://127.0.0.1/index.html --display=:0 &
sudo -u pi epiphany-browser -a --profile ~/.config /var/FLH-Web/html/index.html --display=:0 &
#sudo -u pi epiphany-browser -a --profile ~/.config http://localhost/index.php --display=:0 &
sleep 60s;
# xte "key F11" -x:0
xte "key F11"
