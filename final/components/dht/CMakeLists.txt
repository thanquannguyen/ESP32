set(req driver freertos log esp_idf_lib_helpers)

idf_component_register(SRCS "dht.c"
                    INCLUDE_DIRS "include"
                    REQUIRES ${req})
