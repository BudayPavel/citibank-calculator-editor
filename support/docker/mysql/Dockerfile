FROM mysql:5.7

ENV TERM=xterm \
    DEBIAN_FRONTEND=noninteractive

# add custom config
COPY ./conf/my.cnf /etc/mysql/my.cnf

RUN apt-get update \
    && apt-get -y install nano

#копируем
COPY ["boot.sh", "mysql-import-dump", "mysql-ping-host", "/usr/local/bin/"]

# предоставляем права
RUN chmod +x /usr/local/bin/boot.sh /usr/local/bin/mysql-import-dump /usr/local/bin/mysql-ping-host

# исполняем
CMD docker-entrypoint.sh mysqld | bash /usr/local/bin/boot.sh