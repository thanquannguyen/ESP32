# Distributed under the OSI-approved BSD 3-Clause License.  See accompanying
# file Copyright.txt or https://cmake.org/licensing for details.

cmake_minimum_required(VERSION 3.5)

file(MAKE_DIRECTORY
  "D:/esp/esp-idf/components/bootloader/subproject"
  "D:/LABESP/LAB_Test/build/bootloader"
  "D:/LABESP/LAB_Test/build/bootloader-prefix"
  "D:/LABESP/LAB_Test/build/bootloader-prefix/tmp"
  "D:/LABESP/LAB_Test/build/bootloader-prefix/src/bootloader-stamp"
  "D:/LABESP/LAB_Test/build/bootloader-prefix/src"
  "D:/LABESP/LAB_Test/build/bootloader-prefix/src/bootloader-stamp"
)

set(configSubDirs )
foreach(subDir IN LISTS configSubDirs)
    file(MAKE_DIRECTORY "D:/LABESP/LAB_Test/build/bootloader-prefix/src/bootloader-stamp/${subDir}")
endforeach()
if(cfgdir)
  file(MAKE_DIRECTORY "D:/LABESP/LAB_Test/build/bootloader-prefix/src/bootloader-stamp${cfgdir}") # cfgdir has leading slash
endif()
