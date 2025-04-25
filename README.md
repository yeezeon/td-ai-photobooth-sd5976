# TouchDesigner Character Overlay PhotoBooth

A TouchDesigner-based interactive photo booth application that combines live webcam feed with AI-generated character overlays. Users can take a series of four photos with different character models and receive a combined composite image.

## Features

- **Character Overlay System**: Displays AI-generated Lora character models over live webcam feed
- **Sequential Photo Capture**: Takes four photos with different character overlays
- **Interactive Workflow**: 5-step guided user experience (Start → Take Photo → Approve → Saving → Upload)
- **Photo Combination**: Automatically arranges and combines captured photos
- **Restart Capability**: Option to restart the process for multiple sessions

## Requirements

- TouchDesigner 2023.12230 or later
- Webcam or video input device
- Pre-generated Lora character models (or similar character assets)
- Recommended: 8GB+ RAM, dedicated graphics card

## Installation

1. Clone this repository
```bash
git clone https://github.com/yeezeon/td-ai-photobooth-sd5976.git
```

2. Open the main project file `Photobooth.toe` in TouchDesigner

3. Ensure your webcam is connected and recognized by TouchDesigner

4. Place your character assets in the `/project1/Lora_interface/` directory, named as `lora1`, `lora2`, `lora3`, and `lora4`

## Project Structure

```
/PhotoBooth/
├── characterCompositor    # Compositor for blending video and characters
├── select2                # Select TOP for choosing character models
├── displayScreen          # Null TOP for consistent viewing
├── cache1                 # Cache for storing composite images
├── SavePhoto              # Component for saving images
├── PhotoCombiner          # Network for combining multiple photos
├── Step_1_Start           # Start screen container
├── Step_2_Take_Photo      # Photo capture screen container
├── Step_3_Approve         # Photo approval screen container
├── Step_4_Saving          # Processing screen container
├── Step_5_Upload          # Final display screen container
└── Photos/                # Directory for storing captured images
```

## Usage Guide

1. **Start Screen**: Click the start button to begin the photo session
2. **Take Photo**: Strike a pose and wait for the countdown to complete
3. **Approve Screen**: View the captured photo and choose to approve or retake
4. **Saving Screen**: After capturing all four photos, the system combines them
5. **Upload Screen**: View the final composition and click "Take New Photo" to restart

## Technical Architecture

### Component Flow
- Real-time video (res1) → characterCompositor
- Character selection (select2) → characterCompositor
- Composited image → cache1 and displayScreen
- Panel displays connect to displayScreen
- Saved photos → PhotoCombiner → final composition

### Extension Architecture
The PhotoBooth extension uses a Python class that manages:
- Compositor setup and connections
- Character selection and cycling
- Workflow management between panels
- Photo capture and saving
- Image combination and display

## Key Methods

- `setupCompositor()`: Establishes initial connections
- `selectCharacter()`: Changes character overlay
- `updateCharacterForPhoto()`: Cycles through characters
- `Step1() - Step5()`: Manages workflow transitions
- `ApprovePhoto()`: Saves individual photos
- `CombinePhotos()`: Creates the final composition
- `RestartPhotoBooth()`: Resets the system for a new session

## Troubleshooting

### Common Issues

- **No video input**: Ensure your webcam is properly connected and selected in TouchDesigner
- **Missing character overlays**: Check that character assets exist in the Lora_interface directory
- **Display inconsistencies**: Run `op.PB.debugCompositorConnections()` to verify connections
- **Panels not showing correctly**: Ensure displayScreen is properly connected to all panel displays

### Fixing Panel Displays
If panels don't show character overlays:
1. Create a Null TOP named "displayScreen" in the main PhotoBooth network
2. Connect it to characterCompositor
3. Connect panel display components to this TOP

## Customization

### Adding New Characters
1. Place new character assets in the Lora_interface directory
2. Update the `characterPaths` list in the `selectCharacter` method
3. Modify indices to support additional characters

### Adjusting Photo Layout
1. Edit the PhotoCombiner network to change the arrangement
2. Modify resolution and proportions as needed

## Development Notes

- The system uses cached images to ensure consistent display
- Cross-network references are managed via absolute paths
- TouchDesigner's componentCOMP limitations require manual adjustment of certain display elements

## Credits and License

- Character assets generated using Stable Diffusion with Lora models
- Built with TouchDesigner by Derivative

This project is available under the MIT License. See LICENSE file for details.
