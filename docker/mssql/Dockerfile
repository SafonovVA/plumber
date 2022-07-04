FROM mcr.microsoft.com/mssql/server:2019-latest

USER root

RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app
COPY . /usr/src/app

EXPOSE 1433

RUN chmod +x /usr/src/app/setup.sh
USER mssql
CMD /bin/bash ./entrypoint.sh
