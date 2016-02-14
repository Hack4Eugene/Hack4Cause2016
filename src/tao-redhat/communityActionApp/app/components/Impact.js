var React = require('react-native');
var SnapPicture = require('./SnapPicture');

var {
    TouchableHighlight,
    Text,
    StyleSheet,
    View
} = React;

class Impact extends React.Component{
    handleSubmit(event){
      var report = this.props.report;
      report.impact = 1;

      this.setState({
        report: report
      });
      this.props.navigator.push({
        title: 'Snap',
        component: SnapPicture,
        passProps: {report: this.state.report}
      });
      this.setState({
        report: ''
      });
    }
    render(){

        var layout = (
        <View style={styles.container}>
          <View style={styles.impactHeader}>
            <Text style={styles.impactHeaderType}>
              Severity
            </Text>
          </View>
          <View style={styles.impactContainer}>
            <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'1'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                1
              </Text>
            </TouchableHighlight>
             <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'2'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                2
              </Text>
            </TouchableHighlight>
             <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'3'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                3
              </Text>
            </TouchableHighlight>
             <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'4'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                4
              </Text>
            </TouchableHighlight>
            <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'5'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                5
              </Text>
            </TouchableHighlight>
            <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'6'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                6
              </Text>
            </TouchableHighlight>
            <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'7'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                7
              </Text>
            </TouchableHighlight>
            <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'8'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                8
              </Text>
            </TouchableHighlight>
            <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.impactButton}
              value={'9'}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                9
              </Text>
            </TouchableHighlight>
          </View>
        </View>
        );
        return layout;
    }
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    paddingTop: 140,
  },
  impactContainer: {
    flex: 1,
    flexDirection: 'row',
    flexWrap: 'wrap',
    justifyContent: 'center',
    alignItems: 'center',
    paddingLeft: 24,
    paddingRight: 24
  },
  impactButton: {
    width: 100,
    height: 100,
    justifyContent: 'center',
    backgroundColor: '#f62745',
    padding: 16,
    borderWidth: 1,
    borderColor: '#ffffff'
  },
  issueType: {
    color: '#ffffff',
    textAlign: 'center',
    fontSize: 24,
    fontWeight: 'bold'
  },
  impactHeader: {
    paddingBottom: 50,
    alignItems: 'center'
  },
  impactHeaderType: {
    fontSize: 48,
  }
});


module.exports = Impact;