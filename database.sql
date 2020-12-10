CREATE DATABASE IF NOT EXISTS ips;

use ips;

CREATE TABLE IF NOT EXISTS socursal(
    id                 INT(40),
    direccion          VARCHAR(40),
    horario            VARCHAR(40),
    CONSTRAINT pk_socursal PRIMARY KEY(id)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS pacientes(
    cedula              INT(40),
    nombe               VARCHAR(40),
    apellidos           VARCHAR(80),
    telefono            INT(14),
    email               VARCHAR(40),
    CONSTRAINT pk_pacientes PRIMARY KEY(cedula)
)engine=InnoDb;

CREATE TABLE IF NOT EXISTS fecha(
    fecha           DATE,
    hora            TIME,
    CONSTRAINT pk_fecha PRIMARY KEY(fecha,hora)
)engine=InnoDb;

CREATE TABLE IF NOT EXISTS medicos(
    cedula              INT(40),
    nombre              VARCHAR(40),
    apellidos           VARCHAR(80),
    telefono            VARCHAR(14),
    direccion           VARCHAR(30),
    CONSTRAINT pk_medicos PRIMARY KEY(cedula)

)engine=InnoDb;

CREATE TABLE IF NOT EXISTS citas(
    medico_cedula           INT(40),
    paciente_cedula         INT(40),
    socursal_id             INT(40),
    fecha                   DATE,
    hora                    TIME,
    estado                  VARCHAR(30),
    CONSTRAINT pk_citas PRIMARY KEY(medico_cedula,paciente_cedula,socursal_id,fecha,hora),
    CONSTRAINT fk_medicos_citas  FOREIGN KEY (medico_cedula) REFERENCES medicos(cedula),
    CONSTRAINT fk_pacienteCitas FOREIGN KEY(paciente_cedula) REFERENCES pacientes(cedula),
    CONSTRAINT fk_socursalCitas FOREIGN KEY(socursal_id) REFERENCES socursal(id),
    CONSTRAINT fk_fechaCitas FOREIGN KEY(fecha,hora) REFERENCES fecha(fecha,hora)
)ENGINE=InnoDB;


UPDATE citas SET estado="cancelada" WHERE now() < concat(fecha," ",hora);

INSERT INTO citas (medico_cedula,paciente_cedula,socursal_id,fecha,hora,estado)
        VALUES(1007372725,123456789,1,"2020-03-24","19:00:00","asignada") 
            WHERE 0 >1 ;
           