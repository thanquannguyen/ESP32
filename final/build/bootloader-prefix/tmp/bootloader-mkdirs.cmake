# Distributed under the OSI-approved BSD 3-Clause License.  See accompanying
# file Copyright.txt or https://cmake.org/licensing for details.

cmake_minimum_required(VERSION 3.5)

file(MAKE_DIRECTORY
  "D:/esp/esp-idf/components/bootloader/subproject"
  "D:/repos/ESP32/final/build/bootloader"
  "D:/repos/ESP32/final/build/bootloader-prefix"
  "D:/repos/ESP32/final/build/bootloader-prefix/tmp"
  "D:/repos/ESP32/final/build/bootloader-prefix/src/bootloader-stamp"
  "D:/repos/ESP32/final/build/bootloader-prefix/src"
  "D:/repos/ESP32/final/build/bootloader-prefix/src/bootloader-stamp"
)

set(configSubDirs )
foreach(subDir IN LISTS configSubDirs)
    file(MAKE_DIRECTORY "D:/repos/ESP32/final/build/bootloader-prefix/src/bootloader-stamp/${subDir}")
endforeach()
if(cfgdir)
  file(MAKE_DIRECTORY "D:/repos/ESP32/final/build/bootloader-prefix/src/bootloader-stamp${cfgdir}") # cfgdir has leading slash
endif()
