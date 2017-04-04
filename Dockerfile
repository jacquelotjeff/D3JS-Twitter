FROM ubuntu:16.04

MAINTAINER jacquelotjeff

RUN echo "deb http://repo.mongodb.org/apt/ubuntu xenial/mongodb-org/3.2 multiverse" | tee /etc/apt/sources.list.d/mongodb-org-3.2.list

RUN ssh
RUN apt-get update && \
    apt-get -y install \
        mongodb-org
        curl \
        apache2 \
        php7.0 \
        php7.0-curl \
    rm -rf /var/lib/apt/lists/*

#RUN  apt-key -y adv --keyserver hkp://keyserver.ubuntu.com:80 --recv EA312927
#RUN rm -f /etc/apache2/sites-enabled/000-default.conf
#RUN touch /etc/systemd/system/mongodb.service

#RUN echo "[Unit]
#          Description=High-performance, schema-free document-oriented database
#          After=network.target
#
#          [Service]
#          User=mongodb
#          ExecStart=/usr/bin/mongod --quiet --config /etc/mongod.conf
#
#          [Install]
#          WantedBy=multi-user.target" > /etc/systemd/system/mongodb.service

RUN systemctl start mongodb

VOLUME ["/var/log/apache2"]

EXPOSE 80 443
ENTRYPOINT ["/bin/bash"]