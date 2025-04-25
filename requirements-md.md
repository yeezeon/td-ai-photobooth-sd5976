# Project Requirements

## Software Requirements

- [TouchDesigner](https://derivative.ca/) 2023.12230 or later
  - Commercial or Non-Commercial license depending on usage
  - Educational license is sufficient for academic use

## Hardware Requirements

- Computer with Windows 10/11 or macOS 10.14+
- 8GB RAM minimum (16GB recommended)
- Graphics card with OpenGL 4.1 support
- Webcam or video capture device
- Display with 1920×1080 resolution or higher

## Character Assets

- Four pre-generated Lora character model images with transparent backgrounds
- Recommended formats: PNG or TGA with alpha channel
- Suggested resolution: 1080×1920 or higher
- Place in the `/project1/Lora_interface/` directory as:
  - lora1
  - lora2
  - lora3
  - lora4

## Directory Structure

- `Photos/` directory will be created automatically for storing output images
- Ensure write permissions in the project directory

## Optional Components

- Printer integration for hardcopy output
- Touch screen for direct user interaction
- Custom enclosure for photo booth setup

## Development Requirements

- Python knowledge for extension modification
- Understanding of TouchDesigner networks and component connections
- Familiarity with TOP operators for image manipulation

## Installation Notes

1. Verify TouchDesigner version compatibility
2. Check webcam compatibility with TouchDesigner
3. Ensure proper resolution settings in characterCompositor
4. Test character assets before deployment

## Operating Environment

- Indoor setting with controlled lighting recommended
- Stable network connection if online features are implemented
- Sufficient power supply for extended operation
